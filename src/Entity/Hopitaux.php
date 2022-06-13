<?php

namespace App\Entity;

use App\Repository\HopitauxRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HopitauxRepository::class)]
class Hopitaux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $SITE;

    #[ORM\Column(type: 'float', nullable: true)]
    private $ACC_0;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $DES_0;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $NATURE;

    #[ORM\Column(type: 'float', nullable: true)]
    private $MONTANT;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSITE(): ?string
    {
        return $this->SITE;
    }

    public function setSITE(?string $SITE): self
    {
        $this->SITE = $SITE;

        return $this;
    }

    public function getACC0(): ?float
    {
        return $this->ACC_0;
    }

    public function setACC0(?float $ACC_0): self
    {
        $this->ACC_0 = $ACC_0;

        return $this;
    }

    public function getDES0(): ?string
    {
        return $this->DES_0;
    }

    public function setDES0(?string $DES_0): self
    {
        $this->DES_0 = $DES_0;

        return $this;
    }

    public function getNATURE(): ?string
    {
        return $this->NATURE;
    }

    public function setNATURE(?string $NATURE): self
    {
        $this->NATURE = $NATURE;

        return $this;
    }

    public function getMONTANT(): ?float
    {
        return $this->MONTANT;
    }

    public function setMONTANT(float $MONTANT): self
    {
        $this->MONTANT = $MONTANT;

        return $this;
    }
}
