<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PeripheriqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PeripheriquesController extends AbstractController
{
    private $peripheriqueRepository;
    private $entityManagerInterface;
    public function __construct(PeripheriqueRepository $peripheriqueRepository, EntityManagerInterface $entityManagerInterface) {
        $this->peripheriqueRepository = $peripheriqueRepository;
        $this->entityManagerInterface = $entityManagerInterface;
    }

    #[Route('/peripheriques', name: 'app_peripheriques')]
    public function index(): Response
    {
        return $this->render('peripheriques/index.html.twig', [
            'controller_name' => 'PeripheriquesController',
        ]);
    }
}
