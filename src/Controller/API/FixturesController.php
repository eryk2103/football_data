<?php

namespace App\Controller\API;

use App\DTO\FixtureDTO;
use App\DTO\PaginationDTO;
use App\Entity\Fixture;
use App\Mapper\FixtureMapper;
use App\Repository\FixtureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/fixture', name: 'api_fixture_')]
class FixturesController extends AbstractController
{
    #[Route('', name: 'get_all', methods: ['GET'])]
    public function getAll(#[MapQueryString] PaginationDTO $paginationDTO, FixtureRepository $fixtureRepository, FixtureMapper $fixtureMapper): JsonResponse
    {
        $fixtures = $fixtureRepository->findAllPaginated($paginationDTO->page, $paginationDTO->limit);
        $count = $fixtureRepository->countAll();
        $pages = ceil($count / $paginationDTO->limit);

        $fixturesDTO = array_map(function (Fixture $fixture) use ($fixtureMapper) {
            return $fixtureMapper->mapToDTO($fixture);
        }, $fixtures);

        return $this->json([
            'fixtures' => $fixturesDTO,
            'meta' => [
                'currentPage' => $paginationDTO->page,
                'totalPages' => $pages,
                'perPage' => $paginationDTO->limit,
            ]
        ]);
    }
}
