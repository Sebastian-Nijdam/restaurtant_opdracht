<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReservatieRepository")
 */
class Reservatie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Gebruikers")
     */
    private $Gebruiker_ID;

    /**
     * @ORM\Column(type="date")
     */
    private $Datum;

    /**
     * @ORM\Column(type="time")
     */
    private $Tijd;

    /**
     * @ORM\Column(type="integer")
     */
    private $Actief;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGebruikerID(): ?Gebruikers
    {
        return $this->Gebruiker_ID;
    }

    public function setGebruikerID(?Gebruikers $Gebruiker_ID): self
    {
        $this->Gebruiker_ID = $Gebruiker_ID;

        return $this;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->Datum;
    }

    public function setDatum(\DateTimeInterface $Datum): self
    {
        $this->Datum = $Datum;

        return $this;
    }

    public function getTijd(): ?\DateTimeInterface
    {
        return $this->Tijd;
    }

    public function setTijd(\DateTimeInterface $Tijd): self
    {
        $this->Tijd = $Tijd;

        return $this;
    }

    public function getActief(): ?int
    {
        return $this->Actief;
    }

    public function setActief(int $Actief): self
    {
        $this->Actief = $Actief;

        return $this;
    }
}
