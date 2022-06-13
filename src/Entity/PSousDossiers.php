<?php

namespace App\Entity;

use App\Repository\PSousDossiersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PSousDossiersRepository::class)]
class PSousDossiers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $SousDossier;

    #[ORM\OneToMany(mappedBy: 'ID_SousDossier', targetEntity: Balance::class)]
    private $SousDossier_id;

    #[ORM\ManyToOne(targetEntity: PDossier::class, inversedBy: 'DossierId')]
    private $IdDossier;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    public function __construct()
    {
        $this->SousDossier_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSousDossier(): ?string
    {
        return $this->SousDossier;
    }

    public function setSousDossier(string $SousDossier): self
    {
        $this->SousDossier = $SousDossier;

        return $this;
    }

    /**
     * @return Collection<int, Balance>
     */
    public function getSousDossierId(): Collection
    {
        return $this->SousDossier_id;
    }

    public function addSousDossierId(Balance $sousDossierId): self
    {
        if (!$this->SousDossier_id->contains($sousDossierId)) {
            $this->SousDossier_id[] = $sousDossierId;
            $sousDossierId->setIDSousDossier($this);
        }

        return $this;
    }

    public function removeSousDossierId(Balance $sousDossierId): self
    {
        if ($this->SousDossier_id->removeElement($sousDossierId)) {
            // set the owning side to null (unless already changed)
            if ($sousDossierId->getIDSousDossier() === $this) {
                $sousDossierId->setIDSousDossier(null);
            }
        }

        return $this;
    }

    public function getIdDossier(): ?PDossier
    {
        return $this->IdDossier;
    }

    public function setIdDossier(?PDossier $IdDossier): self
    {
        $this->IdDossier = $IdDossier;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
