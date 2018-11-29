<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KlantenRepository")
 */
class Klanten
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $TelefoonNummer;

    public function getId(): ?int
    {
        return $this->id;
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
}
