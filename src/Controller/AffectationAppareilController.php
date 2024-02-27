<?php

namespace App\Controller;

use App\Entity\Cellulaire;
use App\Entity\Ordinateur;
use App\Entity\Peripherique;
use App\Entity\Utilisateur;
use App\Repository\OrdinateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Notifier\NotifierInterface;

class AffectationAppareilController extends AbstractController
{
	private $ordinateurRepository;
    private $entityManager;
    private $notifier;

	public function __construct(EntityManagerInterface $entityManager, NotifierInterface $notifier) {
        $this->entityManager = $entityManager;
        $this->notifier = $notifier;
    }

    #[Route('/affectation/appareil', name: 'app_affectation_appareil')]
    public function index(): Response
    {
		$ordinateurs = $this->entityManager->getRepository(Ordinateur::class)->findAll();
		$cellulaires = $this->entityManager->getRepository(Cellulaire::class)->findAll();
		$peripheriques = $this->entityManager->getRepository(Peripherique::class)->findAll();

		$items = [];
		$items["ordinateurs"] = $ordinateurs;
		$items["cellulaires"] = $cellulaires;
		$items["peripheriques"] = $peripheriques;

        return $this->render('affectation_appareil/index.html.twig', [
            'controller_name' => 'AffectationAppareilController',
			'items' => $items,
        ]);
    }
}
