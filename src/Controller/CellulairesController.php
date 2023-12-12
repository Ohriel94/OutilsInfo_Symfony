<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CellulaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CellulairesController extends AbstractController
{
    private $cellulaireRepository;
    private $entityManagerInterface;

    public function __construct(CellulaireRepository $cellulaireRepository, EntityManagerInterface $entityManagerInterface) {
        $this->cellulaireRepository = $cellulaireRepository;
        $this->entityManagerInterface = $entityManagerInterface;
    }

    #[Route('/cellulaires', name: 'app_cellulaires')]
    public function Cellulaire(): Response
    {
        $cellulaires = $this->cellulaireRepository->findAll();
        return $this->render('cellulaires/index.html.twig', [
            'controller_name' => 'CellulairesController',
            'cellulaires' => $cellulaires
        ]);
    }
}
