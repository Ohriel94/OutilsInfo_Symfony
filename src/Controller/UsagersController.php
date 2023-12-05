<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsagersController extends AbstractController
{
    #[Route('/usagers', name: 'app_usagers')]
    public function index(): Response
    {
        return $this->render('usagers/index.html.twig', [
            'controller_name' => 'UsagersController',
        ]);
    }
}
