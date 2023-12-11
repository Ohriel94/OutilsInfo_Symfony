<?php

namespace App\Controller;

use App\Repository\CellulaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CellulairesController extends AbstractController
{
    #[Route('/cellulaires', name: 'app_cellulaires')]
    public function Cellulaire(CellulaireRepository $cellulaireRepository): Response
    {
        $cellulaires = $cellulaireRepository->findAll();
        return $this->render('cellulaires/index.html.twig', [
            'controller_name' => 'CellulairesController',
            'cellulaires' => $cellulaires
        ]);
    }
}
