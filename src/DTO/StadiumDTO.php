<?php

namespace App\DTO;

class StadiumDTO
{
    public function __construct(
        public int    $id,
        public string $name,
        public string $country,
        public string $city,
        public int    $capacity,
    )
    {
    }
}
