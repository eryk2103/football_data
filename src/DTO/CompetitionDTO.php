<?php

namespace App\DTO;

class CompetitionDTO
{
    public function __construct(
        public int    $id,
        public string $name,
        public string $shortName,
    )
    {
    }
}
