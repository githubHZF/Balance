<?php

namespace App\Entity;

use App\Repository\POrganismesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: POrganismesRepository::class)]
class POrganismes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Organisme;

    #[ORM\OneToMany(mappedBy: 'ID_Organisme', targetEntity: Balance::class)]
    private $Organisme_id;

    #[ORM\OneToMany(mappedBy: 'IdOrganisme', targetEntity: PDossier::class)]
    private $OrganismeId;

    public function __construct()
    {
        $this->Organisme_id = new ArrayCollection();
        $this->OrganismeId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrganisme(): ?string
    {
        return $this->Organisme;
    }

    public function setOrganisme(string $Organisme): self
    {
        $this->Organisme = $Organisme;

        return $this;
    }

    /**
     * @return Collection<int, Balance>
     */
    public function getOrganismeId(): Collection
    {
        return $this->Organisme_id;
    }

    public function addOrganismeId(Balance $organismeId): self
    {
        if (!$this->Organisme_id->contains($organismeId)) {
            $this->Organisme_id[] = $organismeId;
            $organismeId->setIDOrganisme($this);
        }

        return $this;
    }

    public function removeOrganismeId(Balance $organismeId): self
    {
        if ($this->Organisme_id->removeElement($organismeId)) {
            // set the owning side to null (unless already changed)
            if ($organismeId->getIDOrganisme() === $this) {
                $organismeId->setIDOrganisme(null);
            }
        }

        return $this;
    }
}
