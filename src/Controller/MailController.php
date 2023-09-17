<?php

namespace App\Controller;
use SendGrid;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Doctrine\Persistence\ManagerRegistry;


use SendGrid\Mail\Mail;


class MailController extends AbstractController
{
    #[Route('/api/mail', name: 'app_mail')]
    public function index()
    {

        $sendgrid = new SendGrid('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');

     
        $email = new Mail();
        $email->setFrom('vanaeca@hotmail.com', 'Nom de l\'expéditeur');
        $email->setSubject('Sujet de l\'email');
        $email->addTo('vanaeca@hotmail.com', 'Nom du destinataire');
        $email->addContent("text/plain", 'Contenu texte de l\'email');
        $email->addContent("text/html", '<p>Contenu HTML de l\'email</p>');

   
        try {
            $response = $sendgrid->send($email);
            $statusCode = $response->statusCode();
       
            if ($statusCode === 202) {
                return new Response('Email envoyé avec succès.');
            } else {
                return new Response('Erreur lors de l\'envoi de l\'email.', $statusCode);
            }
        } catch (\Exception $e) {
            return new Response('Erreur lors de l\'envoi de l\'email : ' . $e->getMessage(), 500);
        }
    }
}
