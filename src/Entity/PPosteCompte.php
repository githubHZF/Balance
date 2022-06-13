<?php

namespace App\Entity;

use App\Repository\PPosteCompteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PPosteCompteRepository::class)]
class PPosteCompte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $Exercice;

    #[ORM\Column(type: 'string', length: 255)]
    private $Rubrique;

    #[ORM\Column(type: 'integer')]
    private $Plan;

    #[ORM\Column(type: 'float')]
    private $Solde;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRubrique(): ?string
    {
        return $this->Rubrique;
    }

    public function setRubrique(string $Rubrique): self
    {
        $this->Rubrique = $Rubrique;

        return $this;
    }

    public function getPlan(): ?int
    {
        return $this->Plan;
    }

    public function setPlan(int $Plan): self
    {
        $this->Plan = $Plan;

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
}
