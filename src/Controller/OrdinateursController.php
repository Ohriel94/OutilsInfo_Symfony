<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\OrdinateurRepository;
use App\Entity\Ordinateur;
use App\Form\OrdinateurFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrdinateursController extends AbstractController
{
    private $ordinateurRepository;
    private $entityManager;
    public function __construct(OrdinateurRepository $ordinateurRepository, EntityManagerInterface $entityManager) {
        $this->ordinateurRepository = $ordinateurRepository;
        $this->entityManager = $entityManager;
    }

    #[Route('/ordinateurs', name: 'app_ordinateurs')]
    public function Ordinateur(): Response
    {
        $ordinateurs = $this->ordinateurRepository->findAll();
        
        return $this->render('ordinateurs/index.html.twig', [
            'controller_name' => 'OrdinateursController',
            'ordinateurs' => $ordinateurs
        ]);
    }
    #[Route('/ordinateurs/ajouter', name: 'app_ajouter_ordinateur')]
    public function ajouterOrdinateur(Request $request): Response
    {
        $ordinateur = new Ordinateur();
        $form = $this->createForm(OrdinateurFormType::class, $ordinateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dd($form);
            return $this->redirectToRoute('app_ordinateurs');
        }
        
        return $this->render('ordinateurs/ajouter.html.twig', [
            'ajouterOrdinateurForm' => $form->createView(),
        ]);
    }

    #[Route('/ordinateurs/editer/*', name: 'app_form_ajouter_ordinateur')]
    public function editerOrdinateur(Request $request): Response
    {
        $ordinateur = new Ordinateur();
        $form = $this->createForm(OrdinateurFormType::class, $ordinateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dd($form);
            return $this->redirectToRoute('app_ordinateurs');
        }
        
        return $this->render('ordinateurs/ajouter.html.twig', [
            'ajouterOrdinateurForm' => $form->createView(),
        ]);
    }

    #[Route('/ordinateurs/supprimer/*', name: 'app_form_ajouter_ordinateur')]
    public function supprimerOrdinateur(Request $request, int $id): Response
    {
        $ordinateur = $this->ordinateurRepository->find($id);

        if ($ordinateur !== null) {
            $this->entityManager->remove($ordinateur);
            $this->entityManager->flush();
        }
        else {
            throw $this->createNotFoundException('This computer does not exist');
        }

        return $this->redirectToRoute('app_ordinateurs');
    }
}
