<?php

namespace App\Entity;

use App\Repository\CpcRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CpcRepository::class)]
class Cpc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Structure;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $Exercice1;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $Poste;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $Compte;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Groupe;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $Grp;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $CR;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Libelle;

    #[ORM\Column(type: 'float', nullable: true)]
    private $Exercice_1;

    #[ORM\Column(type: 'float', nullable: true)]
    private $Exercice_2;

    #[ORM\Column(type: 'float', nullable: true)]
    private $TotalExercices;

    #[ORM\Column(type: 'float', nullable: true)]
    private $Exercice2;

    #[ORM\Column(type: 'float', nullable: true)]
    private $Exercice_1_Ex;

    #[ORM\Column(type: 'float', nullable: true)]
    private $Exercice_2_Ex;

    #[ORM\Column(type: 'float', nullable: true)]
    private $TotalExercicesPrec;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $Total;

    #[ORM\Column(type: 'string', length: 255)]
    private $ID_Structure;

    #[ORM\Column(type: 'string', length: 255)]
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStructure(): ?string
    {
        return $this->Structure;
    }

    public function setStructure(string $Structure): self
    {
        $this->Structure = $Structure;

        return $this;
    }

    public function getExercice1(): ?int
    {
        return $this->Exercice1;
    }

    public function setExercice1(int $Exercice1): self
    {
        $this->Exercice1 = $Exercice1;

        return $this;
    }

    public function getExercice2(): ?int
    {
        return $this->Exercice2;
    }

    public function setExercice2(int $Exercice2): self
    {
        $this->Exercice2 = $Exercice2;

        return $this;
    }

    public function getPoste(): ?int
    {
        return $this->Poste;
    }

    public function setPoste(int $Poste): self
    {
        $this->Poste = $Poste;

        return $this;
    }

    public function getCompte(): ?int
    {
        return $this->Compte;
    }

    public function setCompte(int $Compte): self
    {
        $this->Compte = $Compte;

        return $this;
    }

    public function getGroupe(): ?string
    {
        return $this->Groupe;
    }

    public function setGroupe(string $Groupe): self
    {
        $this->Groupe = $Groupe;

        return $this;
    }

    public function getGrp(): ?int
    {
        return $this->Grp;
    }

    public function setGrp(int $Grp): self
    {
        $this->Grp = $Grp;

        return $this;
    }

    public function getCR(): ?string
    {
        return $this->CR;
    }

    public function setCR(string $CR): self
    {
        $this->CR = $CR;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->Libelle;
    }

    public function setLibelle(string $Libelle): self
    {
        $this->Libellé = $Libelle;

        return $this;
    }

    public function getExercice_1(): ?float
    {
        return $this->Exercice_1;
    }

    public function setExercice_1(float $Exercice_1): self
    {
        $this->Exercice_1 = $Exercice_1;

        return $this;
    }

    public function getExercice_2(): ?float
    {
        return $this->Exercice_2;
    }

    public function setExercice_2(float $Exercice_2): self
    {
        $this->Exercice_2 = $Exercice_2;

        return $this;
    }

    public function getTotalExercices(): ?float
    {
        return $this->TotalExercices;
    }

    public function setTotalExercices(float $TotalExercices): self
    {
        $this->TotalExercices = $TotalExercices;

        return $this;
    }

    public function getExercice1Ex(): ?float
    {
        return $this->Exercice_1_Ex;
    }

    public function setExercice1Ex(float $Exercice_1_Ex): self
    {
        $this->Exercice_1_Ex = $Exercice_1_Ex;

        return $this;
    }

    public function getExercice2Ex(): ?float
    {
        return $this->Exercice_2_Ex;
    }

    public function setExercice2Ex(float $Exercice_2_Ex): self
    {
        $this->Exercice_2_Ex = $Exercice_2_Ex;

        return $this;
    }

    public function getTotalExercicesPrec(): ?float
    {
        return $this->TotalExercicesPrec;
    }

    public function setTotalExercicesPrec(float $TotalExercicesPrec): self
    {
        $this->TotalExercicesPrec = $TotalExercicesPrec;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->Total;
    }

    public function setTotal(int $Total): self
    {
        $this->Total = $Total;

        return $this;
    }

    public function getIDStructure(): ?string
    {
        return $this->ID_Structure;
    }

    public function setIDStructure(string $ID_Structure): self
    {
        $this->ID_Structure = $ID_Structure;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
