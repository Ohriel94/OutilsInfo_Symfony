<?php

namespace App\Controller;

use App\Entity\Ordinateur;
use App\Form\AjouterOrdinateurFormType;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormAjouterOrdinateurController extends AbstractController
{
    #[Route('/gestion/ordinateurs/ajouter', name: 'app_form_ajouter_ordinateur')]
    public function ajouterOrdinateur(Request $request, EntityManagerInterface $entityManager): Response
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

            return $this->redirectToRoute('app_gestion');
        }
        
        return $this->render('main/gestion/ajouter/ordinateur.html.twig', [
            'ajouterOrdinateurForm' => $form->createView(),
        ]);
    }
}
