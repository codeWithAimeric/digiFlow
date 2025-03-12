<?php

namespace App\Entity;

use App\Repository\ContinentalRegionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContinentalRegionRepository::class)]
class ContinentalRegion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    /**
     * @var Collection<int, Country>
     */
    #[ORM\ManyToMany(targetEntity: Country::class, inversedBy: 'continentalRegions')]
    private Collection $country;

    /**
     * @var Collection<int, ContinentalRegionTranslations>
     */
    #[ORM\OneToMany(targetEntity: ContinentalRegionTranslations::class, mappedBy: 'continentalRegion', orphanRemoval: true)]
    private Collection $continentalRegionTranslations;

    public function __construct()
    {
        $this->country = new ArrayCollection();
        $this->continentalRegionTranslations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Country>
     */
    public function getCountry(): Collection
    {
        return $this->country;
    }

    public function addCountry(Country $country): static
    {
        if (!$this->country->contains($country)) {
            $this->country->add($country);
        }

        return $this;
    }

    public function removeCountry(Country $country): static
    {
        $this->country->removeElement($country);

        return $this;
    }

    /**
     * @return Collection<int, ContinentalRegionTranslations>
     */
    public function getContinentalRegionTranslations(): Collection
    {
        return $this->continentalRegionTranslations;
    }

    public function addContinentalRegionTranslation(ContinentalRegionTranslations $continentalRegionTranslation): static
    {
        if (!$this->continentalRegionTranslations->contains($continentalRegionTranslation)) {
            $this->continentalRegionTranslations->add($continentalRegionTranslation);
            $continentalRegionTranslation->setContinentalRegion($this);
        }

        return $this;
    }

    public function removeContinentalRegionTranslation(ContinentalRegionTranslations $continentalRegionTranslation): static
    {
        if ($this->continentalRegionTranslations->removeElement($continentalRegionTranslation)) {
            // set the owning side to null (unless already changed)
            if ($continentalRegionTranslation->getContinentalRegion() === $this) {
                $continentalRegionTranslation->setContinentalRegion(null);
            }
        }

        return $this;
    }
}
