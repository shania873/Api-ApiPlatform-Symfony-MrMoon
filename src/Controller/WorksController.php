<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Works;


class WorksController extends AbstractController
{
    #[Route('/api/works', name: 'app_works')]
    public function index(ManagerRegistry $doctrine, Request $request): Response
    {
        return dd("works");
    }

    #[Route('/api/works', name: 'app_works')]
    public function createAction(Works $work, ManagerRegistry $doctrine, Request $request): Response
    {
        return dd("works");
    }
}
