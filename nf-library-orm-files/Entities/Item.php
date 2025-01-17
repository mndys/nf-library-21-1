<?php

namespace App\Entities;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
    
/**
 * @ORM\Entity
 * @ORM\Table(name="items")
 */
class Item
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $coverUrl;

    /**
     * @ORM\Column(type="string")
     */
    protected $artist;

    /**
     * @ORM\Column(type="date")
     */
    protected $releaseDate;
    
    /**
    * @ORM\ManyToOne(targetEntity="Category", inversedBy="items")
    */
    protected $category;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCoverUrl(): string
    {
        return $this->coverUrl;
    }

    public function setCoverUrl(string $coverUrl): void
    {
        $this->coverUrl = $coverUrl;
    }

    public function getArtist(): string
    {
        return $this->artist;
    }

    public function setArtist(string $artist): void
    {
        $this->artist = $artist;
    }

    public function getReleaseDate(): string
    {
        return date_format($this->releaseDate, 'l jS F Y');
    }

    public function setReleaseDate(string $releaseDate): void
    {
        $this->releaseDate = new DateTime($releaseDate);
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }
}