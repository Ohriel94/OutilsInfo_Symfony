<?php

namespace App\Controller;

use App\Repository\OrdinateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GestionOrdinateursController extends AbstractController
{
    #[Route('/gestion/ordinateurs', name: 'app_gestion_ordinateurs')]
    public function index(OrdinateurRepository $ordinateurRepository): Response
    {
        $ordinateurs = $ordinateurRepository->findAll();
        return $this->render('main/gestion_ordinateurs/index.html.twig', [
            'controller_name' => 'GestionOrdinateursController',
            'ordinateurs' => $ordinateurs
        ]);
    }
}
