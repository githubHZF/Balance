<?php

namespace App\Entity;

use App\Repository\PassifRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PassifRepository::class)]
class Passif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Structure;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $Exercice1;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Groupe;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $Poste;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $Titre;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Passif;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Libelle;

    #[ORM\Column(type: 'float', nullable: true)]
    private $Exercice;

    #[ORM\Column(type: 'float', nullable: true)]
    private $Exercice2;

    #[ORM\Column(type: 'float', nullable: true)]
    private $Exercice_Ex;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $structure_id;

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

    public function getGroupe(): ?string
    {
        return $this->Groupe;
    }

    public function setGroupe(string $Groupe): self
    {
        $this->Groupe = $Groupe;

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

    public function getTitre(): ?int
    {
        return $this->Titre;
    }

    public function setTitre(int $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getPassif(): ?string
    {
        return $this->Passif;
    }

    public function setPassif(string $Passif): self
    {
        $this->Passif = $Passif;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->Libelle;
    }

    public function setLibelle(string $Libelle): self
    {
        $this->Libelle = $Libelle;

        return $this;
    }

    public function getExercice(): ?float
    {
        return $this->Exercice;
    }

    public function setExercice(float $Exercice): self
    {
        $this->Exercice = $Exercice;

        return $this;
    }

    public function getExercice2(): ?float
    {
        return $this->Exercice2;
    }

    public function setExercice2(float $Exercice2): self
    {
        $this->Exercice2 = $Exercice2;

        return $this;
    }

    public function getExerciceEx(): ?float
    {
        return $this->Exercice_Ex;
    }

    public function setExerciceEx(float $Exercice_Ex): self
    {
        $this->Exercice_Ex = $Exercice_Ex;

        return $this;
    }

    public function getStructureId(): ?string
    {
        return $this->structure_id;
    }

    public function setStructureId(string $structure_id): self
    {
        $this->structure_id = $structure_id;

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
