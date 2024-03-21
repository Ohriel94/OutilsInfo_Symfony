<?php

namespace App\Controller;

use App\Entity\Ordinateur;
use App\Entity\Fichier;
use App\Form\FichierFormType;
use App\Form\OrdinateurFormType;
use App\Services\FileHandlerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Notifier\NotifierInterface;

class OrdinateursController extends AbstractController
{
    private $entityManager;
    private $notifier;
    public function __construct(EntityManagerInterface $entityManager, NotifierInterface $notifier) {
        $this->entityManager = $entityManager;
        $this->notifier = $notifier;
    }

    #[Route('/ordinateurs', name: 'view_ordinateurs')]
    public function Lister(): Response
    {
        $ordinateurs = $this->entityManager->getRepository(Ordinateur::class)->findAll();   
        
        $this->addFlash('notice','Ordinateurs retrouvés avec succès...');

        return $this->render('ordinateurs/index.html.twig', [
            'controller_name' => 'OrdinateursController',
            'ordinateurs' => $ordinateurs,
            'nbOrdinateurs' => count($ordinateurs)
        ]);
    }
    #[Route('/ordinateurs/ajouter', name: 'ajouter_ordinateur')]
    public function Ajouter(Request $request, FileHandlerService $fileHandlerService): Response
    {
        $ordinateur = new Ordinateur();
        $form = $this->createForm(OrdinateurFormType::class, $ordinateur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
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
            $ordinateur->setMemoire($form['memoire']->getViewData());
            $ordinateur->setDisques($form['disques']->getViewData());
            $ordinateur->setNotes($form['notes']->getViewData());
            $uploadedFile = $form->get('facture')->getData();
            if ($uploadedFile) {
                $fichier = new Fichier();
                $file = $fileHandlerService->uploadFile($uploadedFile);
                $fichier->setFilename($file);
                $this->entityManager->persist($fichier);
            }

            $this->entityManager->persist($ordinateur);
            $this->entityManager->flush();
            
            $this->addFlash('success', 'Un nouvel ordinateur a été ajouté...');

            return $this->redirectToRoute('view_ordinateurs');
        }        
        return $this->render('ordinateurs/ajouter.html.twig', [
            'OrdinateurForm' => $form->createView(),
        ]);
    }

    #[Route('/ordinateurs/editer/{id}', name: 'editer_ordinateur')]
    public function Editer(Request $request, string $id, FileHandlerService $fileHandlerService): Response
    {
        $ordinateur = $this->entityManager->getRepository(Ordinateur::class)->findOneById($id);
        $fileName = $ordinateur->getFacture();
        $fileHandlerService->downloadFile("S-Programme-Entrainement-force-2JOURS-2018-65dfa455504fd.pdf");
        $form = $this->createForm(OrdinateurFormType::class, $ordinateur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if($ordinateur != $form) {
                $ordinateur = $form->getViewData();
                $this->entityManager->persist($ordinateur);
                $this->entityManager->flush();
                // $this->get('session')->getFlashBag()->clear();
                $this->addFlash('success', "Ordinateur {$ordinateur->getNumeroSerie()} à été mis a jour avec succès...");
            }
            return $this->redirectToRoute('view_ordinateurs');
        }
        
        return $this->render('ordinateurs/editer.html.twig', [
            'OrdinateurForm' => $form->createView(),
        ]);
    }

    #[Route('/ordinateurs/supprimer/{id}', name: 'supprimer_ordinateur')]
    public function Supprimer(int $id): Response
    {
        $ordinateur = $this->entityManager->getRepository(Ordinateur::class)->find($id);

        if ($ordinateur !== null) {
            $this->entityManager->remove($ordinateur);
            $this->entityManager->flush();
            $this->addFlash('success', 'L\'Ordinateur été correctement supprimé...');
        }
        else {
            $this->addFlash('error', 'L\'Ordinateur n\'a pas été trouvé, la suppression n\'a pas abouti...');
            throw $this->createNotFoundException('This computer does not exist');
        }
        return $this->redirectToRoute('view_ordinateurs');
    }
    #[Route('/fichier_test',name: 'upload_fichier')]
    public function UploadFichier(): Response 
    {
        $fichier = new Fichier();
        $form = $this->createForm(FichierFormType::class, $fichier);

        return $this->render('fichiers/ajouter.html.twig', ['controller_name' => 'FichierFormTest','FichierForm' => $form->createView()]);
    }
    #[Route('/fichier_test/{fileName}',name: 'download_fichier')]
    public function DownloadFichier(string $fileName = null, FileHandlerService $fileHandlerService): Response 
    {
        $fichier = new Fichier();
        $fichier = $this->entityManager->getRepository(Fichier::class)->findOneByFileName($fileName);
        if($fichier !== null)
            $fileHandlerService->downloadFile($fichier->getFileName());
        
        $form = $this->createForm(FichierFormType::class, $fichier);

        return $this->render('fichiers/ajouter.html.twig', ['controller_name' => 'FichierFormTest','FichierForm' => $form->createView()]);
    }
}
