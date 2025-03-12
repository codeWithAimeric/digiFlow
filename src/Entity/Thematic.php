<?php

namespace App\Entity;

use App\Repository\ThematicRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ThematicRepository::class)]
class Thematic
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 50)]
    private ?string $code = null;

    /**
     * @var Collection<int, ThematicTranslations>
     */
    #[ORM\OneToMany(targetEntity: ThematicTranslations::class, mappedBy: 'thematic')]
    private Collection $thematicTranslations;

    public function __construct()
    {
        $this->thematicTranslations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Collection<int, ThematicTranslations>
     */
    public function getThematicTranslations(): Collection
    {
        return $this->thematicTranslations;
    }

    public function addThematicTranslation(ThematicTranslations $thematicTranslation): static
    {
        if (!$this->thematicTranslations->contains($thematicTranslation)) {
            $this->thematicTranslations->add($thematicTranslation);
            $thematicTranslation->setThematic($this);
        }

        return $this;
    }

    public function removeThematicTranslation(ThematicTranslations $thematicTranslation): static
    {
        if ($this->thematicTranslations->removeElement($thematicTranslation)) {
            // set the owning side to null (unless already changed)
            if ($thematicTranslation->getThematic() === $this) {
                $thematicTranslation->setThematic(null);
            }
        }

        return $this;
    }
}
