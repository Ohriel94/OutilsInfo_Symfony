<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class FileHandlerService
{
    private $fileDirectory;

    public function __construct(ParameterBagInterface $params)
    {
        $this->fileDirectory = $params->get('files_directory');
    }

    public function uploadFile(UploadedFile $file)
    {
        // Manipulez le fichier (par exemple, stockez-le dans un répertoire d'uploads)
        $fileName = md5(uniqid()) . '.' . $file->guessExtension();
        $file->move($this->fileDirectory, $fileName);

        return $fileName;
    }

    public function downloadFile($fileName)
    {
        $filePath = $this->fileDirectory . '/' . $fileName;

        // Créez une réponse pour le téléchargement du fichier
        $response = new BinaryFileResponse($filePath);

        // Configurez le nom du fichier dans la réponse
        $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT, $fileName);

        return $response;
    }
}
