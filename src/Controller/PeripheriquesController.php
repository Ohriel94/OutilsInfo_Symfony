<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PeripheriquesController extends AbstractController
{
    #[Route('/peripheriques', name: 'app_peripheriques')]
    public function index(): Response
    {
        return $this->render('peripheriques/index.html.twig', [
            'controller_name' => 'PeripheriquesController',
        ]);
    }
}
