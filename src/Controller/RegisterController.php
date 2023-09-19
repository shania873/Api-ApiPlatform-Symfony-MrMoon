<?php

namespace App\Controller;
use SendGrid;
use SendGrid\Mail\Mail;
use App\Entity\Register;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RegisterController extends AbstractController
{
    private $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }

    #[Route('/registers', name: 'app_register')]
    public function register(ManagerRegistry $doctrine,Request $request): Response
    {
        $entityManager = $doctrine->getManager();
        $firstname = $request->attributes->get('data')->getFirstName();
        $lastname = $request->attributes->get('data')->getLastName();
 
        $userEmail = $request->attributes->get('data')->getEmail();

        $password = $request->attributes->get('data')->getPassword();
        $activationToken = $request->attributes->get('data')->getActivationToken();

        $registrationInfo = new Register();
     
        $registrationInfo->setEmail($userEmail);
        $registrationInfo->setFirstname($firstname);
        $registrationInfo->setLastname($lastname);
        $registrationInfo->setPassword($password);
        $registrationInfo->setActivation(false);
        

        $activationToken = bin2hex(random_bytes(32));

        
        // $activationLink = $this->generateUrl('activate_account', ['token' => $activationToken], \Symfony\Component\Routing\Generator\UrlGeneratorInterface::ABSOLUTE_URL);
        $registrationInfo->setActivationToken($activationToken);
        
        $apiKey = ($this->getParameter('app.sendgridapikey')) ?$this->getParameter('app.sendgridapikey'): getenv('SENDGRID_API_KEY');

        $sendgrid = new SendGrid($apiKey);

  
        $email = new Mail();
        $email->setFrom('vanaeca@hotmail.com', 'Administrateur');
        $email->setSubject('Confirmez votre compte');
        $email->addTo($userEmail, 'Nom du destinataire');
        $email->addTo('vanaeca@hotmail.com', 'Administrateur');
        $email->addContent(
            "text/html",
            'Bonjour ' . $firstname . ' ' . $lastname . ",<br><br>
            Merci de vous être inscrit depuis mon application.<br><br>
            Si vous êtes une personne à laquelle j'ai postulé, je vais activer votre compte dès que possible. Si vous êtes un spammeur, votre compte sera supprimé dans les 30 jours.<br><br>
            Cordialement, Caroline<br><br>"
        );

  
        try {
            $response = $sendgrid->send($email);
            $statusCode = $response->statusCode();
    
            if ($statusCode === 202) {
                $entityManager->persist($registrationInfo);
                $entityManager->flush();
        
                return new Response('Email envoyé avec succès.');
            } else {
       
                return new Response('Erreur lors de l\'envoi de l\'email de confirmation.', $statusCode);
            }
        } catch (\Exception $e) {
        
            return new Response('Erreur lors de l\'envoi de l\'email de confirmation : ' . $e->getMessage(), 500);
        }
    }
}
