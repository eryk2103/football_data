<?php

namespace App\DTO;

class ClubDTO
{
    public function __construct(
        public int     $id,
        public string  $name,
        public string  $shortName,
        public string  $code,
        public ?string $badgeUrl,
        public string  $country,
        public string  $city,
        public StadiumDTO $stadium,
        public CompetitionDTO $competition,
    )
    {
    }
}
