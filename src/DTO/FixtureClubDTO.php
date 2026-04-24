<?php

namespace App\DTO;

class FixtureClubDTO
{
    public function __construct(
        public int     $id,
        public string  $name,
        public string  $shortName,
        public string  $code,
        public ?string $badgeUrl
    )
    {
    }
}
