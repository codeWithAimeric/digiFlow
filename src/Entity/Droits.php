<?php

namespace App\Entity;

use App\Repository\DroitsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DroitsRepository::class)]
class Droits
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $droitCode = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $droitDescription = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDroitCode(): ?string
    {
        return $this->droitCode;
    }

    public function setDroitCode(string $droitCode): static
    {
        $this->droitCode = $droitCode;

        return $this;
    }

    public function getDroitDescription(): ?string
    {
        return $this->droitDescription;
    }

    public function setDroitDescription(?string $droitDescription): static
    {
        $this->droitDescription = $droitDescription;

        return $this;
    }
}
