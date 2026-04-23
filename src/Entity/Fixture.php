<?php

namespace App\Entity;

use App\Enum\FixtureStatus;
use App\Repository\FixtureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FixtureRepository::class)]
class Fixture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'fixtures')]
    private ?Club $homeTeam = null;

    #[ORM\ManyToOne(inversedBy: 'fixtures')]
    private ?Club $awayTeam = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true, options: ['default' => null])]
    private ?int $homeScore = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true, options: ['default' => null])]
    private ?int $awayScore = null;

    #[ORM\ManyToOne(inversedBy: 'fixtures')]
    private ?Stadium $stadium = null;

    #[ORM\ManyToOne(inversedBy: 'fixtures')]
    private ?Competition $competition = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $datetime = null;

    #[ORM\Column(enumType: FixtureStatus::class, options: ['default' => FixtureStatus::SCHEDULED])]
    private ?FixtureStatus $status = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $matchWeek = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHomeTeam(): ?Club
    {
        return $this->homeTeam;
    }

    public function setHomeTeam(?Club $homeTeam): static
    {
        $this->homeTeam = $homeTeam;

        return $this;
    }

    public function getAwayTeam(): ?Club
    {
        return $this->awayTeam;
    }

    public function setAwayTeam(?Club $awayTeam): static
    {
        $this->awayTeam = $awayTeam;

        return $this;
    }

    public function getHomeScore(): ?int
    {
        return $this->homeScore;
    }

    public function setHomeScore(?int $homeScore): static
    {
        $this->homeScore = $homeScore;

        return $this;
    }

    public function getAwayScore(): ?int
    {
        return $this->awayScore;
    }

    public function setAwayScore(?int $awayScore): static
    {
        $this->awayScore = $awayScore;

        return $this;
    }

    public function getStadium(): ?Stadium
    {
        return $this->stadium;
    }

    public function setStadium(?Stadium $stadium): static
    {
        $this->stadium = $stadium;

        return $this;
    }

    public function getCompetition(): ?Competition
    {
        return $this->competition;
    }

    public function setCompetition(?Competition $competition): static
    {
        $this->competition = $competition;

        return $this;
    }

    public function getDatetime(): ?\DateTime
    {
        return $this->datetime;
    }

    public function setDatetime(?\DateTime $datetime): static
    {
        $this->datetime = $datetime;

        return $this;
    }

    public function getStatus(): ?FixtureStatus
    {
        return $this->status;
    }

    public function setStatus(FixtureStatus $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getMatchWeek(): ?int
    {
        return $this->matchWeek;
    }

    public function setMatchWeek(?int $matchWeek): static
    {
        $this->matchWeek = $matchWeek;

        return $this;
    }
}
