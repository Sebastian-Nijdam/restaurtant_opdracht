<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OpeningsTijdenRepository")
 */
class OpeningsTijden
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
     * @ORM\Column(type="string", length=255)
     */
    private $Dag;

    /**
     * @ORM\Column(type="time")
     */
    private $OpenTijd;

    /**
     * @ORM\Column(type="time")
     */
    private $DichtTijd;

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

    public function getDag(): ?string
    {
        return $this->Dag;
    }

    public function setDag(string $Dag): self
    {
        $this->Dag = $Dag;

        return $this;
    }

    public function getOpenTijd(): ?\DateTimeInterface
    {
        return $this->OpenTijd;
    }

    public function setOpenTijd(\DateTimeInterface $OpenTijd): self
    {
        $this->OpenTijd = $OpenTijd;

        return $this;
    }

    public function getDichtTijd(): ?\DateTimeInterface
    {
        return $this->DichtTijd;
    }

    public function setDichtTijd(\DateTimeInterface $DichtTijd): self
    {
        $this->DichtTijd = $DichtTijd;

        return $this;
    }
}
