<?php

namespace App\Entity;

use App\Repository\FichierRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FichierRepository::class)]
#[ORM\Table('Fichiers')]
class Fichier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::BLOB, nullable: true)]
    private $fileName = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFileName()
    {
        return $this->fileName;
    }

    public function setFileName($fileName): static
    {
        $this->fileName = $fileName;

        return $this;
    }
}
