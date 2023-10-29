<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class UserController extends AbstractController
{
    #[Route('/api/getUser')]
    public function index(Request $request, ManagerRegistry $doctrine, EntityManagerInterface $entityManager, TokenStorageInterface $token): Response
    {
        $tokenget = $token->getToken();
        dd($token);
        $user = $doctrine->getRepository(User::class)->find($tokenget->getUser()->getId());
        $user->setLastLogin(new \DateTime('now'));

        $entityManager->flush();
        return $this->json($tokenget);
    }
}
