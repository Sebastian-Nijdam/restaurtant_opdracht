<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RestaurantsRepository")
 */
class Restaurants
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Naam;

    /**
     * @ORM\Column(type="integer")
     */
    private $TelefoonNummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Plaats;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->Naam;
    }

    public function setNaam(string $Naam): self
    {
        $this->Naam = $Naam;

        return $this;
    }

    public function getTelefoonNummer(): ?int
    {
        return $this->TelefoonNummer;
    }

    public function setTelefoonNummer(int $TelefoonNummer): self
    {
        $this->TelefoonNummer = $TelefoonNummer;

        return $this;
    }

    public function getPlaats(): ?string
    {
        return $this->Plaats;
    }

    public function setPlaats(string $Plaats): self
    {
        $this->Plaats = $Plaats;

        return $this;
    }

    public function __toString()
    {
        return $this->getNaam();
    }
}
