<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountryRepository::class)]
class Country
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $codeIso2 = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $codeIso3 = null;

    #[ORM\Column(length: 10)]
    private ?string $codeInsee = null;

    /**
     * @var Collection<int, CountryTranslations>
     */
    #[ORM\OneToMany(targetEntity: CountryTranslations::class, mappedBy: 'country')]
    private Collection $countryTranslations;

    #[ORM\ManyToOne(inversedBy: 'pays')]
    private ?Continent $continent = null;

    /**
     * @var Collection<int, ContinentalRegion>
     */
    #[ORM\ManyToMany(targetEntity: ContinentalRegion::class, mappedBy: 'country')]
    private Collection $continentalRegions;

    public function __construct()
    {
        $this->countryTranslations = new ArrayCollection();
        $this->continentalRegions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeIso2(): ?string
    {
        return $this->codeIso2;
    }

    public function setCodeIso2(?string $codeIso2): static
    {
        $this->codeIso2 = $codeIso2;

        return $this;
    }

    public function getCodeIso3(): ?string
    {
        return $this->codeIso3;
    }

    public function setCodeIso3(?string $codeIso3): static
    {
        $this->codeIso3 = $codeIso3;

        return $this;
    }

    public function getCodeInsee(): ?string
    {
        return $this->codeInsee;
    }

    public function setCodeInsee(string $codeInsee): static
    {
        $this->codeInsee = $codeInsee;

        return $this;
    }

    /**
     * @return Collection<int, CountryTranslations>
     */
    public function getCountryTranslations(): Collection
    {
        return $this->countryTranslations;
    }

    public function addCountryTranslation(CountryTranslations $countryTranslation): static
    {
        if (!$this->countryTranslations->contains($countryTranslation)) {
            $this->countryTranslations->add($countryTranslation);
            $countryTranslation->setCountry($this);
        }

        return $this;
    }

    public function removeCountryTranslation(CountryTranslations $countryTranslation): static
    {
        if ($this->countryTranslations->removeElement($countryTranslation)) {
            // set the owning side to null (unless already changed)
            if ($countryTranslation->getCountry() === $this) {
                $countryTranslation->setCountry(null);
            }
        }

        return $this;
    }

    public function getContinent(): ?Continent
    {
        return $this->continent;
    }

    public function setContinent(?Continent $continent): static
    {
        $this->continent = $continent;

        return $this;
    }

    /**
     * @return Collection<int, ContinentalRegion>
     */
    public function getContinentalRegions(): Collection
    {
        return $this->continentalRegions;
    }

    public function addContinentalRegion(ContinentalRegion $continentalRegion): static
    {
        if (!$this->continentalRegions->contains($continentalRegion)) {
            $this->continentalRegions->add($continentalRegion);
            $continentalRegion->addCountry($this);
        }

        return $this;
    }

    public function removeContinentalRegion(ContinentalRegion $continentalRegion): static
    {
        if ($this->continentalRegions->removeElement($continentalRegion)) {
            $continentalRegion->removeCountry($this);
        }

        return $this;
    }
}
