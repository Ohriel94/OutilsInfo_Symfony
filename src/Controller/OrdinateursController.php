<?php

namespace App\Controller;


use App\Entity\Ordinateur;
use App\Form\AjouterOrdinateurFormType;
use DateTimeImmutable;
use App\Repository\OrdinateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrdinateursController extends AbstractController
{
    #[Route('/ordinateurs', name: 'app_ordinateurs')]
    public function Ordinateur(OrdinateurRepository $ordinateurRepository): Response
    {
        $ordinateurs = $ordinateurRepository->findAll();
        
        return $this->render('ordinateurs/index.html.twig', [
            'controller_name' => 'OrdinateursController',
            'ordinateurs' => $ordinateurs
        ]);
    }
    #[Route('/ordinateurs/ajouter', name: 'app_ajouter_ordinateur')]
    public function ajouterOrdinateur(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ordinateur = new Ordinateur();
        $form = $this->createForm(AjouterOrdinateurFormType::class, $ordinateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ordinateur->setDisques(explode(';', $form->getData('disques')));
            $dateAquisition = $form->getData('dateAquisition');
            $dateSortie = $form->getData('dateSortie');
            $ordinateur->setDateAcquisition(new \DateTimeImmutable($dateAquisition));
            $ordinateur->setDateSortie(new \DateTimeImmutable($dateSortie));
            $entityManager->persist($ordinateur);
            $entityManager->flush();

            return $this->redirectToRoute('app_ordinateurs');
        }
        
        return $this->render('ordinateurs/ajouter.html.twig', [
            'ajouterOrdinateurForm' => $form->createView(),
        ]);
    }

    #[Route('/ordinateurs/editer/*', name: 'app_form_ajouter_ordinateur')]
    public function editerOrdinateur(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ordinateur = new Ordinateur();
        $form = $this->createForm(AjouterOrdinateurFormType::class, $ordinateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ordinateur->setNumeroSerie($form->get('numeroSerie')->getData());
            $ordinateur->setEtatDisponible(true);
            $ordinateur->setMarque($form->get('marque')->getData());
            $ordinateur->setModele($form->get('modele')->getData());
            $ordinateur->setDateAcquisition(new DateTimeImmutable('2023-11-26'));
            $ordinateur->setDateSortie(new DateTimeImmutable('2018-12-04'));
            $ordinateur->setSysteme($form->get('systeme')->getData());
            $ordinateur->setCpu($form->get('cpu')->getData());
            $ordinateur->setGpu($form->get('gpu')->getData());
            $ordinateur->setMemoire($form->get('memoire')->getData());
            $ordinateur->setDisques(explode(';', $form->get('disques')->getData()));
            $ordinateur->setNotes($form->get('notes')->getData());
            $entityManager->persist($ordinateur);
            $entityManager->flush();

            return $this->redirectToRoute('app_ordinateurs');
        }
        
        return $this->render('ordinateurs/ajouter.html.twig', [
            'ajouterOrdinateurForm' => $form->createView(),
        ]);
    }

    #[Route('/ordinateurs/supprimer/*', name: 'app_form_ajouter_ordinateur')]
    public function supprimerOrdinateur(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ordinateur = new Ordinateur();
        $form = $this->createForm(AjouterOrdinateurFormType::class, $ordinateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ordinateur->setDisques(explode(';', $form->getData('disques')));
            $ordinateur->setDateAcquisition(new DateTimeImmutable('2023-11-26'));
            $ordinateur->setDateSortie(new DateTimeImmutable('2018-12-04'));
            $entityManager->persist($ordinateur);
            $entityManager->flush();

            return $this->redirectToRoute('app_ordinateurs');
        }
        
        return $this->render('ordinateurs/ajouter.html.twig', [
            'ajouterOrdinateurForm' => $form->createView(),
        ]);
    }
}
