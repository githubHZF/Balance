<?php

namespace App\Entity;

use App\Repository\BalanceparamRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BalanceparamRepository::class)]
class Balanceparam
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'float', nullable: true)]
    private $ligne;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $classe;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $libelleCompte;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $poste;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $compte;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $sousCompte;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $sens;

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getClasse(): ?int
    {
        return $this->classe;
    }

    public function setClasse(?int $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    public function getLibelleCompte(): ?string
    {
        return $this->libelleCompte;
    }

    public function setLibelleCompte(?string $libelleCompte): self
    {
        $this->libelleCompte = $libelleCompte;

        return $this;
    }

    public function getPoste(): ?int
    {
        return $this->poste;
    }

    public function setPoste(?int $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    public function getCompte(): ?int
    {
        return $this->compte;
    }

    public function setCompte(?int $compte): self
    {
        $this->compte = $compte;

        return $this;
    }

    public function getSousCompte(): ?int
    {
        return $this->sousCompte;
    }

    public function setSousCompte(?int $sousCompte): self
    {
        $this->sousCompte = $sousCompte;

        return $this;
    }

    public function getSens(): ?int
    {
        return $this->sens;
    }

    public function setSens(?int $sens): self
    {
        $this->sens = $sens;

        return $this;
    }

    public function getLigne(): ?float
    {
        return $this->ligne;
    }

    public function setLigne(?float $ligne): self
    {
        $this->ligne = $ligne;

        return $this;
    }
}
