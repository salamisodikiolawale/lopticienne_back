<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ArticleRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 * @ApiResource(
 *      
 *      normalizationContext = {
 *          "groups" : {"article_read"}
 *      }
 * )
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"article_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"article_read"})
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"article_read"})
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"article_read"})
     */
    private $quantity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"article_read"})
     */
    private $color;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"article_read"})
     */
    private $createAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"article_read"})
     */
    private $endAt;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"article_read"})
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"article_read"})
     */
    private $gender;

    /**
     * @ORM\ManyToOne(targetEntity=MakeArticle::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"article_read"})
     */
    private $make;

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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeInterface $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getEndAt(): ?\DateTimeInterface
    {
        return $this->endAt;
    }

    public function setEndAt(?\DateTimeInterface $endAt): self
    {
        $this->endAt = $endAt;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getMake(): ?MakeArticle
    {
        return $this->make;
    }

    public function setMake(?MakeArticle $make): self
    {
        $this->make = $make;

        return $this;
    }
}
