<?php

namespace App\Mapper;

use App\DTO\FixtureClubDTO;
use App\DTO\FixtureDTO;
use App\Entity\Club;
use App\Entity\Fixture;

class FixtureMapper
{
    public function __construct(private StadiumMapper $stadiumMapper, private CompetitionMapper $competitionMapper)
    {
    }

    public function mapToDTO(Fixture $fixture): FixtureDTO
    {
        return new FixtureDTO(
            $fixture->getId(),
            $this->mapToClubDTO($fixture->getHomeTeam()),
            $this->mapToClubDTO($fixture->getAwayTeam()),
            $fixture->getHomeScore(),
            $fixture->getAwayScore(),
            $this->stadiumMapper->mapToDTO($fixture->getStadium()),
            $this->competitionMapper->mapToDTO($fixture->getCompetition()),
            $fixture->getMatchWeek(),
            $fixture->getStatus(),
            $fixture->getDatetime()
        );
    }

    private function mapToClubDTO(CLub $club): FixtureClubDTO
    {
        return new FixtureClubDTO(
            $club->getId(),
            $club->getName(),
            $club->getShortName(),
            $club->getCode(),
            $club->getBadgeUrl()
        );
    }
}
