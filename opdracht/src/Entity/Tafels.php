<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TafelsRepository")
 */
class Tafels
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Restaurants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Restaurant_ID;

    /**
     * @ORM\Column(type="integer")
     */
    private $Zitplaatsen;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRestaurantID(): ?Restaurants
    {
        return $this->Restaurant_ID;
    }

    public function setRestaurantID(?Restaurants $Restaurant_ID): self
    {
        $this->Restaurant_ID = $Restaurant_ID;

        return $this;
    }

    public function getZitplaatsen(): ?int
    {
        return $this->Zitplaatsen;
    }

    public function setZitplaatsen(int $Zitplaatsen): self
    {
        $this->Zitplaatsen = $Zitplaatsen;

        return $this;
    }
}
