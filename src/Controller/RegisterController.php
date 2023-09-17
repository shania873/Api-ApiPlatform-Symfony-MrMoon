<?php

namespace App\Controller;
use SendGrid;
use SendGrid\Mail\Mail;
use App\Entity\Register;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RegisterController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $request = Request::createFromGlobals();
        $firstname = $request->request->get('firstname');
        $lastname = $request->request->get('lastname');
        $userEmail = $request->request->get('email');
        $password = $request->request->get('password');
        $activationToken = $request->request->get('activation_token');

        $registrationInfo = new Register();

        $registrationInfo->setEmail($userEmail);
        $registrationInfo->setFirstname($firstname);
        $registrationInfo->setLastname($lastname);
        $registrationInfo->setPassword($password);
        $registrationInfo->setActivation(false);
        

        $activationToken = bin2hex(random_bytes(32));

        
        $activationLink = $this->generateUrl('activate_account', ['token' => $activationToken], \Symfony\Component\Routing\Generator\UrlGeneratorInterface::ABSOLUTE_URL);
        $registrationInfo->setActivationToken($activationLink);


        $sendgrid = new SendGrid('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');

  
        $email = new Mail();
        $email->setFrom('vanaeca@hotmail.com', 'Administrateur');
        $email->setSubject('Confirmez votre compte');
        $email->addTo($userEmail, 'Nom du destinataire');
        $email->addContent(
            "text/html",
            'Cliquez sur le lien suivant pour activer votre compte : <a href="' . $activationLink . '">Activer votre compte</a>'
        );

    
        try {
            $response = $sendgrid->send($email);
            $statusCode = $response->statusCode();

            if ($statusCode === 202) {
                $entityManager->persist($registrationInfo);
                $entityManager->flush();
        
                return new Response('Email de confirmation envoyé avec succès.');
            } else {
       
                return new Response('Erreur lors de l\'envoi de l\'email de confirmation.', $statusCode);
            }
        } catch (\Exception $e) {
        
            return new Response('Erreur lors de l\'envoi de l\'email de confirmation : ' . $e->getMessage(), 500);
        }
    }
}
