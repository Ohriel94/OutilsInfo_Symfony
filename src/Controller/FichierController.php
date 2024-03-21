<?php

namespace App\Controller;

use App\Services\FileHandlerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class FichierController extends AbstractController
{

    #[Route('/facture/{id}', name: 'download_file')]
    public function Download(Request $request, string $id, FileHandlerService $fileHandlerService): Response
    {
        $fichier = new File($this->getParameter('files_directory').'/'.$id);
        return $this->file($fichier);
    }
}
