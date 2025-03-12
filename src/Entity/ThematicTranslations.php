<?php

namespace App\Entity;

use App\Repository\ThematicTranslationsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ThematicTranslationsRepository::class)]
class ThematicTranslations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 7)]
    private ?string $translationCode = null;

    #[ORM\Column(length: 100)]
    private ?string $translationLibelle = null;

    #[ORM\ManyToOne(inversedBy: 'thematicTranslations')]
    private ?Thematic $thematic = null;

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

    public function getThematic(): ?Thematic
    {
        return $this->thematic;
    }

    public function setThematic(?Thematic $thematic): static
    {
        $this->thematic = $thematic;

        return $this;
    }
}
