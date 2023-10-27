<?php

namespace App\Controller;

use App\Repository\CellulaireRepository;
use App\Repository\OrdinateurRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GestionController extends AbstractController
{
    #[Route('/gestion/ordinateurs', name: 'gestion_ordinateurs')]
    public function Ordinateur(OrdinateurRepository $ordinateurRepository): Response
    {
        $ordinateurs = $ordinateurRepository->findAll();
        return $this->render('main/gestion/ordinateur.html.twig', [
            'controller_name' => 'GestionController',
            'ordinateurs' => $ordinateurs
        ]);
    }
    #[Route('/gestion/cellulaires', name: 'gestion_cellulaires')]
    public function Cellulaire(CellulaireRepository $cellulaireRepository): Response
    {
        $cellulaires = $cellulaireRepository->findAll();
        return $this->render('main/gestion/cellulaire.html.twig', [
            'controller_name' => 'GestionController',
            'cellulaires' => $cellulaires
        ]);
    }
}
