<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $month_price = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $day_price = null;

    #[ORM\Column]
    private ?int $seats = null;

    #[ORM\Column]
    private ?bool $gearbox = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getMonthPrice(): ?string
    {
        return $this->month_price;
    }

    public function setMonthPrice(string $month_price): static
    {
        $this->month_price = $month_price;

        return $this;
    }

    public function getDayPrice(): ?string
    {
        return $this->day_price;
    }

    public function setDayPrice(string $day_price): static
    {
        $this->day_price = $day_price;

        return $this;
    }

    public function getSeats(): ?int
    {
        return $this->seats;
    }

    public function setSeats(int $seats): static
    {
        $this->seats = $seats;

        return $this;
    }

    public function getGearbox(): ?bool
    {
        return $this->gearbox;
    }

    public function setGearbox(bool $gearbox): static
    {
        $this->gearbox = $gearbox;

        return $this;
    }
}
