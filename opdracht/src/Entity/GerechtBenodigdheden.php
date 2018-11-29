<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GerechtBenodigdhedenRepository")
 */
class GerechtBenodigdheden
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Gerechten")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Gerecht_ID;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Producten")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Product_ID;

    /**
     * @ORM\Column(type="integer")
     */
    private $Benodigdheden;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGerechtID(): ?Gerechten
    {
        return $this->Gerecht_ID;
    }

    public function setGerechtID(?Gerechten $Gerecht_ID): self
    {
        $this->Gerecht_ID = $Gerecht_ID;

        return $this;
    }

    public function getProductID(): ?Producten
    {
        return $this->Product_ID;
    }

    public function setProductID(?Producten $Product_ID): self
    {
        $this->Product_ID = $Product_ID;

        return $this;
    }

    public function getBenodigdheden(): ?int
    {
        return $this->Benodigdheden;
    }

    public function setBenodigdheden(int $Benodigdheden): self
    {
        $this->Benodigdheden = $Benodigdheden;

        return $this;
    }
}
