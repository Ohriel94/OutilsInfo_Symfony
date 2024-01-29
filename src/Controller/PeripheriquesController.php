<?php

namespace App\Controller;

use App\Entity\Peripherique;
use App\Form\PeripheriqueFormType;
use App\Repository\PeripheriqueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Notifier\NotifierInterface;

class PeripheriquesController extends AbstractController
{
    private $peripheriqueRepository;
    private $entityManager;
    private $notifier;
    public function __construct(PeripheriqueRepository $peripheriqueRepository, EntityManagerInterface $entityManager, NotifierInterface $notifier) {
        $this->peripheriqueRepository = $peripheriqueRepository;
        $this->entityManager = $entityManager;
        $this->notifier = $notifier;
    }

    #[Route('/peripheriques', name: 'view_peripheriques')]
    public function Lister(): Response
    {
        $peripheriques = $this->peripheriqueRepository->findAll();   
        
        $this->addFlash('notice','Peripheriques retrouvés avec succès...');

        return $this->render('peripheriques/index.html.twig', [
            'controller_name' => 'PeripheriquesController',
            'peripheriques' => $peripheriques,
            'nbPeripheriques' => count($peripheriques)
        ]);
    }
    #[Route('/peripheriques/ajouter', name: 'ajouter_peripherique')]
    public function Ajouter(Request $request): Response
    {
        $peripherique = new Peripherique();
        $form = $this->createForm(PeripheriqueFormType::class, $peripherique);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $peripherique->setNumeroSerie(''.rand(0,9).rand(0,9).rand(0,9).rand(0,9));
            $peripherique->setEtatDisponible(True);
            $peripherique->setMarque($form['marque']->getViewData());
            $peripherique->setModele($form['modele']->getViewData());
            $peripherique->setType($form['type']->getViewData());
            $peripherique->setNotes($form['notes']->getViewData());

            $this->entityManager->persist($peripherique);
            $this->entityManager->flush();
            
            $this->addFlash('success', 'Un nouveau peripherique a été ajouté...');

            return $this->redirectToRoute('view_peripheriques');
        }        
        return $this->render('peripheriques/ajouter.html.twig', [
            'PeripheriqueForm' => $form->createView(),
        ]);
    }

    #[Route('/peripheriques/editer/{id}', name: 'editer_peripherique')]
    public function Editer(Request $request, string $id): Response
    {
        $peripherique = $this->peripheriqueRepository->findOneById($id);
        
        $form = $this->createForm(PeripheriqueFormType::class, $peripherique);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if($peripherique != $form) {
                $peripherique = $form->getViewData();
                $this->entityManager->persist($peripherique);
                $this->entityManager->flush();
                // $this->get('session')->getFlashBag()->clear();
                $this->addFlash('success', "Ordinaeur {$peripherique->getNumeroSerie()} à été mis a jour avec succès...");
            }
            return $this->redirectToRoute('view_peripheriques');
        }
        
        return $this->render('peripheriques/editer.html.twig', [
            'PeripheriqueForm' => $form->createView(),
        ]);
    }

    #[Route('/peripheriques/supprimer/{id}', name: 'supprimer_peripherique')]
    public function Supprimer(int $id): Response
    {
        $peripherique = $this->peripheriqueRepository->find($id);

        if ($peripherique !== null) {
            $this->entityManager->remove($peripherique);
            $this->entityManager->flush();
            $this->addFlash('success', 'L\'Peripherique été correctement supprimé...');
        }
        else {
            $this->addFlash('error', 'L\'Peripherique n\'a pas été trouvé, la suppression n\'a pas abouti...');
            throw $this->createNotFoundException('This computer does not exist');
        }
        return $this->redirectToRoute('view_peripheriques');
    }
}