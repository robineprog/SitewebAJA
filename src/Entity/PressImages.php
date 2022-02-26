<?php

namespace App\Entity;

use App\Repository\PressImagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PressImagesRepository::class)
 */
class PressImages
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
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=ArticlesPress::class, inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $press;

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

    public function getPress(): ?ArticlesPress
    {
        return $this->press;
    }

    public function setPress(?ArticlesPress $press): self
    {
        $this->press = $press;

        return $this;
    }
}
