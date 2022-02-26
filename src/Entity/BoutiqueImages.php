<?php

namespace App\Entity;

use App\Repository\BoutiqueImagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BoutiqueImagesRepository::class)
 */
class BoutiqueImages
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
     * @ORM\ManyToOne(targetEntity=ArticlesBoutique::class, inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $boutique;

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

    public function getBoutique(): ?ArticlesBoutique
    {
        return $this->boutique;
    }

    public function setBoutique(?ArticlesBoutique $boutique): self
    {
        $this->boutique = $boutique;

        return $this;
    }
}
