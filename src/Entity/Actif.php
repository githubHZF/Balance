<?php

namespace App\Entity;

use App\Repository\ActifRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActifRepository::class)]
class Actif
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
    private $Titre;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Actif;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Libelle;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $Poste;

    #[ORM\Column(type: 'float', nullable: true)]
    private $Brut;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $Compte;

    #[ORM\Column(type: 'float', nullable: true)]
    private $AmmoProv;

    #[ORM\Column(type: 'float', nullable: true)]
    private $Net;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $Exercice2;

    #[ORM\Column(type: 'float', nullable: true)]
    private $Brut_Ex;

    #[ORM\Column(type: 'float', nullable: true)]
    private $AmmoProv_Ex;

    #[ORM\Column(type: 'float', nullable: true)]
    private $Net_Ex;

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

    public function setStructure(?string $Structure): self
    {
        $this->Structure = $Structure;

        return $this;
    }

    public function getExercice1(): ?int
    {
        return $this->Exercice1;
    }

    public function setExercice1(?int $Exercice1): self
    {
        $this->Exercice1 = $Exercice1;

        return $this;
    }

    public function getGroupe(): ?string
    {
        return $this->Groupe;
    }

    public function setGroupe(?string $Groupe): self
    {
        $this->Groupe = $Groupe;

        return $this;
    }

    public function getTitre(): ?int
    {
        return $this->Titre;
    }

    public function setTitre(?int $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getActif(): ?string
    {
        return $this->Actif;
    }

    public function setActif(?string $Actif): self
    {
        $this->Actif = $Actif;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->Libelle;
    }

    public function setLibelle(?string $Libelle): self
    {
        $this->Libelle = $Libelle;

        return $this;
    }

    public function getPoste(): ?int
    {
        return $this->Poste;
    }

    public function setPoste(?int $Poste): self
    {
        $this->Poste = $Poste;

        return $this;
    }

    public function getBrut(): ?float
    {
        return $this->Brut;
    }

    public function setBrut(?float $Brut): self
    {
        $this->Brut = $Brut;

        return $this;
    }

    public function getCompte(): ?int
    {
        return $this->Compte;
    }

    public function setCompte(?int $Compte): self
    {
        $this->Compte = $Compte;

        return $this;
    }

    public function getAmmoProv(): ?float
    {
        return $this->AmmoProv;
    }

    public function setAmmoProv(?float $AmmoProv): self
    {
        $this->AmmoProv = $AmmoProv;

        return $this;
    }

    public function getNet(): ?float
    {
        return $this->Net;
    }

    public function setNet(?float $Net): self
    {
        $this->Net = $Net;

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

    public function getBrutEx(): ?float
    {
        return $this->Brut_Ex;
    }

    public function setBrutEx(?float $Brut_Ex): self
    {
        $this->Brut_Ex = $Brut_Ex;

        return $this;
    }

    public function getAmmoProvEx(): ?float
    {
        return $this->AmmoProv_Ex;
    }

    public function setAmmoProvEx(?float $AmmoProv_Ex): self
    {
        $this->AmmoProv_Ex = $AmmoProv_Ex;

        return $this;
    }

    public function getNetEx(): ?float
    {
        return $this->Net_Ex;
    }

    public function setNetEx(?float $Net_Ex): self
    {
        $this->Net_Ex = $Net_Ex;

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
