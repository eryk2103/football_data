<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;
class PaginationDTO
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Positive]
        public int $page = 1,

        #[Assert\NotBlank]
        #[Assert\Positive]
        public int $limit = 20,
    ) {}
}
