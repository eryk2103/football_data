<?php

namespace App\Mapper;

use App\DTO\CompetitionDTO;
use App\Entity\Competition;

class CompetitionMapper
{
    public function mapToDTO(Competition $competition): CompetitionDTO
    {
        return new CompetitionDTO(
            $competition->getId(),
            $competition->getName(),
            $competition->getShortName()
        );
    }
}
