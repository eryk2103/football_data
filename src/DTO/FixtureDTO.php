<?php

namespace App\DTO;

use App\Enum\FixtureStatus;

class FixtureDTO
{
    public function __construct(
        public int            $id,
        public FixtureClubDTO $homeTeam,
        public FixtureClubDTO $awayTeam,
        public ?int           $homeScore,
        public ?int           $awayScore,
        public StadiumDTO     $stadium,
        public CompetitionDTO $competition,
        public ?int           $matchweek,
        public FixtureStatus  $status,
        public ?\DateTime     $datetime,
    )
    {
    }
}
