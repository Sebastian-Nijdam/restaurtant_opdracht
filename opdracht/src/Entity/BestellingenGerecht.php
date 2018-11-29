<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BestellingenGerechtRepository")
 */
class BestellingenGerecht
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bestellingen")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Bestelling_ID;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Gerechten")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Gerecht_ID;

    /**
     * @ORM\Column(type="integer")
     */
    private $ProductKwantitiet;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getGerechtID(): ?Gerechten
    {
        return $this->Gerecht_ID;
    }

    public function setGerechtID(?Gerechten $Gerecht_ID): self
    {
        $this->Gerecht_ID = $Gerecht_ID;

        return $this;
    }

    public function getProductKwantitiet(): ?int
    {
        return $this->ProductKwantitiet;
    }

    public function setProductKwantitiet(int $ProductKwantitiet): self
    {
        $this->ProductKwantitiet = $ProductKwantitiet;

        return $this;
    }
}
