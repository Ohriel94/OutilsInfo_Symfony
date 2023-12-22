<?php

namespace App\Entity;

use App\Repository\OrdinateurRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdinateurRepository::class)]
#[ORM\Table(name:"Ordinateurs")]
class Ordinateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numeroSerie = null;

    #[ORM\Column]
    private ?bool $etatDisponible = null;

    #[ORM\Column(length: 40)]
    private ?string $marque = null;

    #[ORM\Column(length: 40)]
    private ?string $modele = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE,nullable: true)]
    private ?\DateTimeImmutable $dateAcquisition = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE,nullable: true)]
    private ?\DateTimeImmutable $dateSortie = null;

    #[ORM\Column(length: 255,nullable: true)]
    private ?string $systeme = null;

    #[ORM\Column(length: 255,nullable: true)]
    private ?string $cpu = null;

    #[ORM\Column(length: 255,nullable: true)]
    private ?string $gpu = null;

    #[ORM\Column(nullable: true)]
    private ?int $memoire = null;

    #[ORM\Column(type: Types::JSON)]
    private ?array $disques = [];

    #[ORM\Column(length: 255)]
    private ?string $notes = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroSerie(): ?int
    {
        return $this->numeroSerie;
    }

    public function setNumeroSerie(int $numeroSerie): static
    {
        $this->numeroSerie = $numeroSerie;

        return $this;
    }

    public function isEtatDisponible(): ?bool
    {
        return $this->etatDisponible;
    }

    public function setEtatDisponible(bool $etatDisponible): static
    {
        $this->etatDisponible = $etatDisponible;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(?string $marque): static
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(?string $modele): static
    {
        $this->modele = $modele;

        return $this;
    }

    public function getDateAcquisition(): ?\DateTimeImmutable
    {
        return $this->dateAcquisition;
    }

    public function setDateAcquisition(?\DateTimeImmutable $dateAcquisition): static
    {
        $this->dateAcquisition = $dateAcquisition;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeImmutable
    {
        return $this->dateSortie;
    }

    public function setDateSortie(?\DateTimeImmutable $dateSortie): static
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    public function getSysteme(): ?string
    {
        return $this->systeme;
    }

    public function setSysteme(?string $systeme): static
    {
        $this->systeme = $systeme;

        return $this;
    }

    public function getCpu(): ?string
    {
        return $this->cpu;
    }

    public function setCpu(?string $cpu): static
    {
        $this->cpu = $cpu;

        return $this;
    }

    public function getGpu(): ?string
    {
        return $this->gpu;
    }

    public function setGpu(?string $gpu): static
    {
        $this->gpu = $gpu;

        return $this;
    }

    public function getMemoire(): ?int
    {
        return $this->memoire;
    }

    public function setMemoire(?int $memoire): static
    {
        $this->memoire = $memoire;

        return $this;
    }

    public function getDisques(): ?array
    {
        return $this->disques;
    }

    public function setDisques(?array $disques): static
    {
        $this->disques = $disques;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): static
    {
        $this->notes = $notes;

        return $this;
    }
}
