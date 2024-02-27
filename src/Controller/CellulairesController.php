<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CellulaireRepository;
use App\Form\CellulaireFormType;
use App\Entity\Cellulaire;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CellulairesController extends AbstractController
{
    private $cellulaireRepository;
    private $entityManager;

    public function __construct(CellulaireRepository $cellulaireRepository, EntityManagerInterface $entityManagerInterface) {
        $this->cellulaireRepository = $cellulaireRepository;
        $this->entityManager = $entityManagerInterface;
    }

    #[Route('/cellulaires', name: 'view_cellulaires')]
    public function Lister(): Response
    {
        $cellulaires = $this->cellulaireRepository->findAll();
        return $this->render('cellulaires/index.html.twig', [
            'controller_name' => 'CellulairesController',
            'cellulaires' => $cellulaires,
            'nbCellulaires' => count($cellulaires)
        ]);
    }

    #[Route('/cellulaires/ajouter', name: 'ajouter_cellulaire')]
    public function Ajouter(Request $request): Response
    {
        $cellulaire = new Cellulaire();
        $form = $this->createForm(CellulaireFormType::class, $cellulaire);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $cellulaire->setNumeroSerie(''.rand(0,9).rand(0,9).rand(0,9).rand(0,9));
            $cellulaire->setEtatDisponible(True);
            $cellulaire->setMarque($form['marque']->getViewData());
            $cellulaire->setModele($form['modele']->getViewData());
            $dateSortie = $form['dateSortie']->getViewData();
            $cellulaire->setDateSortie(new \DateTimeImmutable(sprintf('%04d%02d%02d',$dateSortie['year'],$dateSortie['month'],$dateSortie['day'])));
            $dateAcquisition = $form['dateAcquisition']->getViewData();
            $cellulaire->setDateAcquisition(new \DateTimeImmutable(sprintf('%04d%02d%02d',$dateAcquisition['year'],$dateAcquisition['month'],$dateAcquisition['day'])));
            $cellulaire->setSysteme($form['systeme']->getViewData());
            $cellulaire->setCpu($form['cpu']->getViewData());
            $cellulaire->setGpu($form['gpu']->getViewData());
            $cellulaire->setMemoire($form['memoire']->getViewData());
            $cellulaire->setStockage($form['stockage']->getViewData());
            $cellulaire->setNotes($form['notes']->getViewData());

            $this->entityManager->persist($cellulaire);
            $this->entityManager->flush();

            $this->addFlash('notice', 'Un nouveau cellulaire a été ajouté...');
            
            return $this->redirectToRoute('view_cellulaires');
        }        
        return $this->render('cellulaires/ajouter.html.twig', [
            'CellulaireForm' => $form->createView(),
        ]);
    }

    #[Route('/cellulaires/editer/{id}', name: 'editer_cellulaire')]
    public function Editer(Request $request, string $id): Response
    {
        $cellulaire = $this->cellulaireRepository->findOneById($id);
        
        $form = $this->createForm(CellulaireFormType::class, $cellulaire);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if($cellulaire != $form) {
                $cellulaire = $form->getViewData();
                $this->entityManager->persist($cellulaire);
                $this->entityManager->flush();
                $this->addFlash('success', "Cellulaire {$cellulaire->getNumeroSerie()} has been modified...");
            }
            return $this->redirectToRoute('view_cellulaires');
        }
        
        return $this->render('cellulaires/editer.html.twig', [
            'CellulaireForm' => $form->createView(),
        ]);
    }

    #[Route('/cellulaires/supprimer/{id}', name: 'supprimer_cellulaire')]
    public function Supprimer(int $id): Response
    {
        $cellulaire = $this->cellulaireRepository->find($id);

        if ($cellulaire !== null) {
            $this->entityManager->remove($cellulaire);
            $this->entityManager->flush();
            $this->addFlash('success', 'L\'Cellulaire été correctement supprimé...');
        }
        else { 
            $this->addFlash('error', 'L\'Cellulaire n\'a pas été trouvé, la suppression n\'a pas abouti...');
            throw $this->createNotFoundException('This computer does not exist');
        }

        return $this->redirectToRoute('view_cellulaires');
    }
}
