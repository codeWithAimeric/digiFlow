<?php

namespace App\Entity;

use App\Repository\ContinentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContinentRepository::class)]
class Continent
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
    #[ORM\OneToMany(targetEntity: Country::class, mappedBy: 'continent')]
    private Collection $country;

    /**
     * @var Collection<int, ContinentTranslations>
     */
    #[ORM\OneToMany(targetEntity: ContinentTranslations::class, mappedBy: 'Continent')]
    private Collection $continentTranslations;

    public function __construct()
    {
        $this->country = new ArrayCollection();
        $this->continentTranslations = new ArrayCollection();
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
    public function getcountry(): Collection
    {
        return $this->country;
    }

    public function addPay(Country $pay): static
    {
        if (!$this->country->contains($pay)) {
            $this->country->add($pay);
            $pay->setContinent($this);
        }

        return $this;
    }

    public function removePay(Country $pay): static
    {
        if ($this->country->removeElement($pay)) {
            // set the owning side to null (unless already changed)
            if ($pay->getContinent() === $this) {
                $pay->setContinent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ContinentTranslations>
     */
    public function getContinentTranslations(): Collection
    {
        return $this->continentTranslations;
    }

    public function addContinentTranslation(ContinentTranslations $continentTranslation): static
    {
        if (!$this->continentTranslations->contains($continentTranslation)) {
            $this->continentTranslations->add($continentTranslation);
            $continentTranslation->setContinent($this);
        }

        return $this;
    }

    public function removeContinentTranslation(ContinentTranslations $continentTranslation): static
    {
        if ($this->continentTranslations->removeElement($continentTranslation)) {
            // set the owning side to null (unless already changed)
            if ($continentTranslation->getContinent() === $this) {
                $continentTranslation->setContinent(null);
            }
        }

        return $this;
    }
}
