<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 */
class Image
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
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lunettes", inversedBy="image", cascade={"persist"})
     */
    private $lunettes;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLunettes(): ?Lunettes
    {
        return $this->lunettes;
    }

    public function setLunettes(?Lunettes $lunettes): self
    {
        $this->lunettes = $lunettes;

        return $this;
    }

    public function __toString(){
        return $this->name;
    }
}
