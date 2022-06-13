<?php

namespace App\Entity;

use App\Repository\BalanceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BalanceRepository::class)]
class Balance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'float', nullable: true)]
    private $Ligne;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $Classe;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $Poste;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $Compte;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $SousCompte;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Libelle;

    #[ORM\Column(type: 'float', nullable: true)]
    private $Debit;

    #[ORM\Column(type: 'float', nullable: true)]
    private $Credit;

    #[ORM\Column(type: 'float', nullable: true)]
    private $Solde;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Formule;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $Exercice;

    #[ORM\Column(type: 'date', nullable: true)]
    private $Date_Sys;

    #[ORM\ManyToOne(targetEntity: POrganismes::class, inversedBy: 'Organisme_id')]
    private $ID_Organisme;

    #[ORM\ManyToOne(targetEntity: PDossier::class, inversedBy: 'Dossier_id')]
    private $ID_Dossier;

    #[ORM\ManyToOne(targetEntity: PSousDossiers::class, inversedBy: 'SousDossier_id')]
    private $ID_SousDossier;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLigne(): ?float
    {
        return $this->Ligne;
    }

    public function setLigne(float $Ligne): self
    {
        $this->Ligne = $Ligne;

        return $this;
    }

    public function getClasse(): ?int
    {
        return $this->Classe;
    }

    public function setClasse(int $Classe): self
    {
        $this->Classe = $Classe;

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

    public function getSousCompte(): ?int
    {
        return $this->SousCompte;
    }

    public function setSousCompte(int $SousCompte): self
    {
        $this->SousCompte = $SousCompte;

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

    public function getDebit(): ?float
    {
        return $this->Debit;
    }

    public function setDebit(float $Debit): self
    {
        $this->Debit = $Debit;

        return $this;
    }

    public function getCredit(): ?float
    {
        return $this->Credit;
    }

    public function setCredit(float $Credit): self
    {
        $this->Credit = $Credit;

        return $this;
    }

    public function getSolde(): ?float
    {
        return $this->Solde;
    }

    public function setSolde(float $Solde): self
    {
        $this->Solde = $Solde;

        return $this;
    }

    public function getFormule(): ?string
    {
        return $this->Formule;
    }

    public function setFormule(string $Formule): self
    {
        $this->Formule = $Formule;

        return $this;
    }

    public function getExercice(): ?int
    {
        return $this->Exercice;
    }

    public function setExercice(int $Exercice): self
    {
        $this->Exercice = $Exercice;

        return $this;
    }

    public function getDateSys(): ?\DateTimeInterface
    {
        return $this->Date_Sys;
    }

    public function setDateSys(\DateTimeInterface $Date_Sys): self
    {
        $this->Date_Sys = $Date_Sys;

        return $this;
    }

    public function getIDOrganisme(): ?POrganismes
    {
        return $this->ID_Organisme;
    }

    public function setIDOrganisme(?POrganismes $ID_Organisme): self
    {
        $this->ID_Organisme = $ID_Organisme;

        return $this;
    }

    public function getIDDossier(): ?PDossier
    {
        return $this->ID_Dossier;
    }

    public function setIDDossier(?PDossier $ID_Dossier): self
    {
        $this->ID_Dossier = $ID_Dossier;

        return $this;
    }

    public function getIDSousDossier(): ?PSousDossiers
    {
        return $this->ID_SousDossier;
    }

    public function setIDSousDossier(?PSousDossiers $ID_SousDossier): self
    {
        $this->ID_SousDossier = $ID_SousDossier;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
