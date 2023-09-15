<?php

namespace App\Controller;

use App\Repository\CellulaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GestionCellulairesController extends AbstractController
{
    #[Route('/gestion/cellulaires', name: 'app_gestion_cellulaires')]
    public function index(CellulaireRepository $cellulairesRepository): Response
    {
        $cellulaires = $cellulairesRepository->findAll();
        return $this->render('main/gestion_cellulaires/index.html.twig', [
            'controller_name' => 'GestionCellulairesController',
            'cellulaires' => $cellulaires
        ]);
    }
}
