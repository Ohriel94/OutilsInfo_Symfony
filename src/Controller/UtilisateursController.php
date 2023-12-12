<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UtilisateursController extends AbstractController
{
    private $utilisateurRepository;
    private $entityManagerInterface;
    public function __construct(UtilisateurRepository $utilisateurRepository, EntityManagerInterface $entityManagerInterface) {
        $this->utilisateurRepository = $utilisateurRepository;
        $this->entityManagerInterface = $entityManagerInterface;
    }

    #[Route('/utilisateurs', name: 'app_utilisateurs')]
    public function index(): Response
    {
        return $this->render('utilisateurs/index.html.twig', [
            'controller_name' => 'UtilisateursController',
        ]);
    }
}
