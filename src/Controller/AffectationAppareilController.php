<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AffectationAppareilController extends AbstractController
{
    #[Route('/affectation/appareil', name: 'app_affectation_appareil')]
    public function index(): Response
    {
        return $this->render('affectation_appareil/index.html.twig', [
            'controller_name' => 'AffectationAppareilController',
        ]);
    }
}
