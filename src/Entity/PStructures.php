<?php

namespace App\Entity;

use App\Repository\PStructuresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PStructuresRepository::class)]
class PStructures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Abrev;

    #[ORM\Column(type: 'string', length: 255)]
    private $Structure;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAbrev(): ?string
    {
        return $this->Abrev;
    }

    public function setAbrev(string $Abrev): self
    {
        $this->Abrev = $Abrev;

        return $this;
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
}
