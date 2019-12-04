<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormeRepository")
 */
class Forme
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
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex(pattern="/^[a-z0-9\-]+$/")
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Lunettes", mappedBy="forme")
     */
    private $lunettes;

    public function __construct()
    {
        $this->lunettes = new ArrayCollection();
    }

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection|Lunettes[]
     */
    public function getLunettes(): Collection
    {
        return $this->lunettes;
    }

    public function addLunette(Lunettes $lunette): self
    {
        if (!$this->lunettes->contains($lunette)) {
            $this->lunettes[] = $lunette;
            $lunette->setForme($this);
        }

        return $this;
    }

    public function removeLunette(Lunettes $lunette): self
    {
        if ($this->lunettes->contains($lunette)) {
            $this->lunettes->removeElement($lunette);
            // set the owning side to null (unless already changed)
            if ($lunette->getForme() === $this) {
                $lunette->setForme(null);
            }
        }

        return $this;
    }
    public function __toString(){
        return $this->name;
    }
}
