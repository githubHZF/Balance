<?php

namespace App\Entity;

use App\Repository\HczRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HczRepository::class)]
class Hcz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'float', nullable: true)]
    private $acc_0;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $des_0;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $annee;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nature;

    #[ORM\Column(type: 'float', nullable: true)]
    private $ca;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAcc0(): ?float
    {
        return $this->acc_0;
    }

    public function setAcc0(?float $acc_0): self
    {
        $this->acc_0 = $acc_0;

        return $this;
    }

    public function getDes0(): ?string
    {
        return $this->des_0;
    }

    public function setDes0(?string $des_0): self
    {
        $this->des_0 = $des_0;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(?int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getNature(): ?string
    {
        return $this->nature;
    }

    public function setNature(?string $nature): self
    {
        $this->nature = $nature;

        return $this;
    }

    public function getCa(): ?float
    {
        return $this->ca;
    }

    public function setCa(?float $ca): self
    {
        $this->ca = $ca;

        return $this;
    }
}
