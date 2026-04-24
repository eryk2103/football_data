<?php

namespace App\Mapper;

use App\DTO\ClubDTO;
use App\Entity\Club;

class ClubMapper
{
    public function __construct(private StadiumMapper $stadiumMapper, private CompetitionMapper $competitionMapper)
    {
    }

    public function mapToDTO(Club $club): ClubDTO
    {
        return new ClubDTO(
            $club->getId(),
            $club->getName(),
            $club->getShortName(),
            $club->getCode(),
            $club->getBadgeUrl(),
            $club->getCountry(),
            $club->getCity(),
            $this->stadiumMapper->mapToDTO($club->getStadium()),
            $this->competitionMapper->mapToDTO($club->getLeague())
        );
    }
}
