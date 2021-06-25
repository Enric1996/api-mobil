<?php

namespace App\Entity;

use App\Repository\MobilesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MobilesRepository::class)
 */
class Mobiles
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Modelo;

    /**
     * @ORM\Column(type="float")
     */
    private $pvp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModelo(): ?string
    {
        return $this->Modelo;
    }

    public function setModelo(string $Modelo): self
    {
        $this->Modelo = $Modelo;

        return $this;
    }

    public function getPvp(): ?float
    {
        return $this->pvp;
    }

    public function setPvp(float $pvp): self
    {
        $this->pvp = $pvp;

        return $this;
    }
}
