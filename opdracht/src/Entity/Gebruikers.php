<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GebruikersRepository")
 */
class Gebruikers
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Klanten", cascade={"persist", "remove"})
     */
    private $Klant_ID;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Naam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Wachtwoord;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKlantID(): ?Klanten
    {
        return $this->Klant_ID;
    }

    public function setKlantID(?Klanten $Klant_ID): self
    {
        $this->Klant_ID = $Klant_ID;

        return $this;
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

    public function getWachtwoord(): ?string
    {
        return $this->Wachtwoord;
    }

    public function setWachtwoord(string $Wachtwoord): self
    {
        $this->Wachtwoord = $Wachtwoord;

        return $this;
    }
}
