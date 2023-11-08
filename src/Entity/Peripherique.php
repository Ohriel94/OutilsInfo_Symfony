<?php

namespace App\Entity;

use App\Repository\PeripheriqueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PeripheriqueRepository::class)]
#[ORM\Table(name:"Peripheriques")]
class Peripherique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numeroSerie = null;

    #[ORM\Column]
    private ?bool $etatDisponible = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $marque = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $modele = null;

    #[ORM\Column(length: 255, nullable: true)]
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

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
