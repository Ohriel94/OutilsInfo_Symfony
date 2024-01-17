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

    #[Route('/ordinateurs', name: 'view_ordinateurs')]
    public function Lister(): Response
    {
        $ordinateurs = $this->ordinateurRepository->findAll();
        
        return $this->render('ordinateurs/index.html.twig', [
            'controller_name' => 'OrdinateursController',
            'ordinateurs' => $ordinateurs,
            'nbOrdinateurs' => count($ordinateurs)
        ]);
    }
    #[Route('/ordinateurs/ajouter', name: 'ajouter_ordinateur')]
    public function Ajouter(Request $request): Response
    {
        $ordinateur = new Ordinateur();
        $form = $this->createForm(OrdinateurFormType::class, $ordinateur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $ordinateur->setNumeroSerie(''.rand(0,9).rand(0,9).rand(0,9).rand(0,9));
            $ordinateur->setEtatDisponible(True);
            $ordinateur->setMarque($form['marque']->getViewData());
            $ordinateur->setModele($form['modele']->getViewData());
            $dateSortie = $form['dateSortie']->getViewData();
            $ordinateur->setDateSortie(new \DateTimeImmutable(sprintf('%04d%02d%02d',$dateSortie['year'],$dateSortie['month'],$dateSortie['day'])));
            $dateAcquisition = $form['dateAcquisition']->getViewData();
            $ordinateur->setDateAcquisition(new \DateTimeImmutable(sprintf('%04d%02d%02d',$dateAcquisition['year'],$dateAcquisition['month'],$dateAcquisition['day'])));
            $ordinateur->setSysteme($form['systeme']->getViewData());
            $ordinateur->setCpu($form['cpu']->getViewData());
            $ordinateur->setGpu($form['gpu']->getViewData());
            $ordinateur->setMemoire(explode(";", $form['memoire']->getViewData()));
            $ordinateur->setDisques(explode(";", $form['disques']->getViewData()));
            $ordinateur->setNotes($form['notes']->getViewData());

            $this->entityManager->persist($ordinateur);
            $this->entityManager->flush();
            
            $this->addFlash('notice', 'Un nouvel '.get_class($ordinateur).' a été ajouté...');

            return $this->redirectToRoute('view_ordinateurs');
        }        
        return $this->render('ordinateurs/ajouter.html.twig', [
            'OrdinateurForm' => $form->createView(),
        ]);
    }

    #[Route('/ordinateurs/editer/{id}', name: 'editer_ordinateur')]
    public function Editer(Request $request, string $id): Response
    {
        $ordinateur = $this->ordinateurRepository->findOneById($id);
        
        $form = $this->createForm(OrdinateurFormType::class, $ordinateur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if($ordinateur != $form) {
                $ordinateur = $form->getViewData();
                $this->entityManager->persist($ordinateur);
                $this->entityManager->flush();
                $this->addFlash('success', "Ordinaeur {$id} has been modified...");
            }
            return $this->redirectToRoute('view_ordinateurs');
        }
        
        return $this->render('ordinateurs/editer.html.twig', [
            'OrdinateurForm' => $form->createView(),
        ]);
    }

    #[Route('/ordinateurs/supprimer/*', name: 'supprimer_ordinateur')]
    public function Supprimer(Request $request, int $id): Response
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
