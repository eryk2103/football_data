<?php

namespace App\Mapper;

use App\DTO\StadiumDTO;
use App\Entity\Stadium;

class StadiumMapper
{
    public function mapToDTO(Stadium $stadium): StadiumDTO
    {
        return new StadiumDTO(
            $stadium->getId(),
            $stadium->getName(),
            $stadium->getCountry(),
            $stadium->getCity(),
            $stadium->getCapacity()
        );
    }
}
