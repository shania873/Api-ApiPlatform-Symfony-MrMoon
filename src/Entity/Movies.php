<?php

namespace App\Entity;

use App\Repository\MoviesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MoviesRepository::class)]
class Movies
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Release_Date = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

 

    #[ORM\Column]
    private ?int $Popularity = null;

    #[ORM\Column]
    private ?int $Vote_Count = null;

    #[ORM\Column]
    private ?int $Vote_Average = null;

    #[ORM\Column(length: 255)]
    private ?string $Original_Language = null;

    #[ORM\Column(length: 255)]
    private ?string $Genre = null;

    #[ORM\Column(length: 255)]
    private ?string $Poster_Url = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $overview = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->Release_Date;
    }

    public function setReleaseDate(\DateTimeInterface $Release_Date): static
    {
        $this->Release_Date = $Release_Date;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }



    public function getPopularity(): ?string
    {
        return $this->Popularity;
    }

    public function setPopularity(string $Popularity): static
    {
        $this->Popularity = $Popularity;

        return $this;
    }

    public function getVoteCount(): ?int
    {
        return $this->Vote_Count;
    }

    public function setVoteCount(int $Vote_Count): static
    {
        $this->Vote_Count = $Vote_Count;

        return $this;
    }

    public function getVoteAverage(): ?int
    {
        return $this->Vote_Average;
    }

    public function setVoteAverage(int $Vote_Average): static
    {
        $this->Vote_Average = $Vote_Average;

        return $this;
    }

    public function getOriginalLanguage(): ?string
    {
        return $this->Original_Language;
    }

    public function setOriginalLanguage(string $Original_Language): static
    {
        $this->Original_Language = $Original_Language;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->Genre;
    }

    public function setGenre(string $Genre): static
    {
        $this->Genre = $Genre;

        return $this;
    }

    public function getPosterUrl(): ?string
    {
        return $this->Poster_Url;
    }

    public function setPosterUrl(string $Poster_Url): static
    {
        $this->Poster_Url = $Poster_Url;

        return $this;
    }

    public function getOverview(): ?string
    {
        return $this->overview;
    }

    public function setOverview(?string $overview): static
    {
        $this->overview = $overview;

        return $this;
    }
}
