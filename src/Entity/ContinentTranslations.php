<?php

namespace App\Entity;

use App\Repository\ContinentTranslationsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContinentTranslationsRepository::class)]
class ContinentTranslations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 7)]
    private ?string $translationCode = null;

    #[ORM\Column(length: 50)]
    private ?string $translationLibelle = null;

    #[ORM\ManyToOne(inversedBy: 'continentTranslations')]
    private ?Continent $Continent = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTranslationCode(): ?string
    {
        return $this->translationCode;
    }

    public function setTranslationCode(string $translationCode): static
    {
        $this->translationCode = $translationCode;

        return $this;
    }

    public function getTranslationLibelle(): ?string
    {
        return $this->translationLibelle;
    }

    public function setTranslationLibelle(string $translationLibelle): static
    {
        $this->translationLibelle = $translationLibelle;

        return $this;
    }

    public function getContinent(): ?Continent
    {
        return $this->Continent;
    }

    public function setContinent(?Continent $Continent): static
    {
        $this->Continent = $Continent;

        return $this;
    }
}
