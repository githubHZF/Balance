<?php

namespace App\Entity;

use App\Repository\Table1Repository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: Table1Repository::class)]
class Table1
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', nullable: true)]
    private $id;

    #[ORM\Column(type: 'float', nullable: true)]
    private $Ligne;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $LibelléCompte;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $Poste;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLigne(): ?float
    {
        return $this->Ligne;
    }

    public function setLigne(?float $Ligne): self
    {
        $this->Ligne = $Ligne;

        return $this;
    }

    public function getLibelléCompte(): ?string
    {
        return $this->LibelléCompte;
    }

    public function setLibelléCompte(?string $LibelléCompte): self
    {
        $this->LibelléCompte = $LibelléCompte;

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
}
