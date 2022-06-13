<?php

namespace App\Entity;

use App\Repository\PDossierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PDossierRepository::class)]
class PDossier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Dossier;

    #[ORM\OneToMany(mappedBy: 'ID_Dossier', targetEntity: Balance::class)]
    private $Dossier_id;

    #[ORM\ManyToOne(targetEntity: POrganismes::class, inversedBy: 'OrganismeId')]
    private $IdOrganisme;

    #[ORM\OneToMany(mappedBy: 'IdDossier', targetEntity: PSousDossiers::class)]
    private $DossierId;

    public function __construct()
    {
        $this->Dossier_id = new ArrayCollection();
        $this->DossierId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDossier(): ?string
    {
        return $this->Dossier;
    }

    public function setDossier(string $Dossier): self
    {
        $this->Dossier = $Dossier;

        return $this;
    }

    /**
     * @return Collection<int, Balance>
     */
    public function getDossierId(): Collection
    {
        return $this->Dossier_id;
    }

    public function addDossierId(Balance $dossierId): self
    {
        if (!$this->Dossier_id->contains($dossierId)) {
            $this->Dossier_id[] = $dossierId;
            $dossierId->setIDDossier($this);
        }

        return $this;
    }

    public function removeDossierId(Balance $dossierId): self
    {
        if ($this->Dossier_id->removeElement($dossierId)) {
            // set the owning side to null (unless already changed)
            if ($dossierId->getIDDossier() === $this) {
                $dossierId->setIDDossier(null);
            }
        }

        return $this;
    }

    public function getIdOrganisme(): ?POrganismes
    {
        return $this->IdOrganisme;
    }

    public function setIdOrganisme(?POrganismes $IdOrganisme): self
    {
        $this->IdOrganisme = $IdOrganisme;

        return $this;
    }
}
