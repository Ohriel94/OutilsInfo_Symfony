<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[ORM\Table(name:"Utilisateurs")]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $prenom = null;

    #[ORM\Column(length: 80)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'Utilisateur', targetEntity: Ordinateur::class)]
    private Collection $OrdinateursAffectes;

    public function __construct()
    {
        $this->OrdinateursAffectes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Ordinateur>
     */
    public function getOrdinateursAffectes(): Collection
    {
        return $this->OrdinateursAffectes;
    }

    public function addOrdinateursAffecte(Ordinateur $ordinateursAffecte): static
    {
        if (!$this->OrdinateursAffectes->contains($ordinateursAffecte)) {
            $this->OrdinateursAffectes->add($ordinateursAffecte);
            $ordinateursAffecte->setUtilisateur($this);
        }

        return $this;
    }

    public function removeOrdinateursAffecte(Ordinateur $ordinateursAffecte): static
    {
        if ($this->OrdinateursAffectes->removeElement($ordinateursAffecte)) {
            // set the owning side to null (unless already changed)
            if ($ordinateursAffecte->getUtilisateur() === $this) {
                $ordinateursAffecte->setUtilisateur(null);
            }
        }

        return $this;
    }
}
