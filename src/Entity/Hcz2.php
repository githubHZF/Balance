<?php

namespace App\Entity;

use App\Repository\Hcz2Repository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: Hcz2Repository::class)]
class Hcz2
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

    #[ORM\Column(type: 'float', nullable: true)]
    private $credit;

    #[ORM\Column(type: 'float', nullable: true)]
    private $debit;

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

    public function getCredit(): ?float
    {
        return $this->credit;
    }

    public function setCredit(?float $credit): self
    {
        $this->credit = $credit;

        return $this;
    }

    public function getDebit(): ?float
    {
        return $this->debit;
    }

    public function setDebit(?float $debit): self
    {
        $this->debit = $debit;

        return $this;
    }
}
