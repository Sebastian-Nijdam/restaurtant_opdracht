<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReservatieTafelsRepository")
 */
class ReservatieTafels
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tafels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Tafel_ID;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bestellingen")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Bestelling_ID;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Reservatie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Reservatie_ID;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTafelID(): ?Tafels
    {
        return $this->Tafel_ID;
    }

    public function setTafelID(?Tafels $Tafel_ID): self
    {
        $this->Tafel_ID = $Tafel_ID;

        return $this;
    }

    public function getBestellingID(): ?Bestellingen
    {
        return $this->Bestelling_ID;
    }

    public function setBestellingID(?Bestellingen $Bestelling_ID): self
    {
        $this->Bestelling_ID = $Bestelling_ID;

        return $this;
    }

    public function getReservatieID(): ?Reservatie
    {
        return $this->Reservatie_ID;
    }

    public function setReservatieID(?Reservatie $Reservatie_ID): self
    {
        $this->Reservatie_ID = $Reservatie_ID;

        return $this;
    }
}
