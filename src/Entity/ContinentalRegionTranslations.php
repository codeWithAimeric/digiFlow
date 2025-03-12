<?php

namespace App\Entity;

use App\Repository\ContinentalRegionTranslationsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContinentalRegionTranslationsRepository::class)]
class ContinentalRegionTranslations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 7)]
    private ?string $translationCode = null;

    #[ORM\Column(length: 50)]
    private ?string $translationLibelle = null;

    #[ORM\ManyToOne(inversedBy: 'continentalRegionTranslations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ContinentalRegion $continentalRegion = null;

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

    public function getContinentalRegion(): ?ContinentalRegion
    {
        return $this->continentalRegion;
    }

    public function setContinentalRegion(?ContinentalRegion $continentalRegion): static
    {
        $this->continentalRegion = $continentalRegion;

        return $this;
    }
}
