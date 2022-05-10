<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\MakeArticleRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=MakeArticleRepository::class)
 * @ApiResource(
 *      normalizationContext = {
 *          "groups" : {"make_article_read"}
 *      }
 * )
 */
class MakeArticle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"make_article_read", "article_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"make_article_read", "article_read"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"make_article_read", "article_read"})
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="make")
     * @Groups({"make_article_read"})
     */
    private $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->setMake($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getMake() === $this) {
                $article->setMake(null);
            }
        }

        return $this;
    }
}
