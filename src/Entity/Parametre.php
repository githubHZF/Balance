<?php

namespace App\Entity;

use App\Repository\ParametreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParametreRepository::class)]
class Parametre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Src;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $LgnS;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Expression;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $Grp;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $xSigne;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSrc(): ?string
    {
        return $this->Src;
    }

    public function setSrc(?string $Src): self
    {
        $this->Src = $Src;

        return $this;
    }

    public function getLgnS(): ?int
    {
        return $this->LgnS;
    }

    public function setLgnS(?int $LgnS): self
    {
        $this->LgnS = $LgnS;

        return $this;
    }

    public function getExpression(): ?string
    {
        return $this->Expression;
    }

    public function setExpression(?string $Expression): self
    {
        $this->Expression = $Expression;

        return $this;
    }

    public function getGrp(): ?int
    {
        return $this->Grp;
    }

    public function setGrp(?int $Grp): self
    {
        $this->Grp = $Grp;

        return $this;
    }

    public function getXSigne(): ?string
    {
        return $this->xSigne;
    }

    public function setXSigne(?string $xSigne): self
    {
        $this->xSigne = $xSigne;

        return $this;
    }
}
