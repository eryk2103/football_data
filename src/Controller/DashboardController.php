<?php

namespace App\Controller;

use App\Repository\FixtureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/dashboard', name: 'app_dashboard_')]
class DashboardController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(FixtureRepository $fixtureRepository): Response
    {
        $fixturesToUpdate = $fixtureRepository->findInvalid();
        $upcomingFixtures = $fixtureRepository->findGtByDate(new \DateTime());
        $fixturesWithoutDate = $fixtureRepository->findBy(['datetime' => null]);

        return $this->render('dashboard/index.html.twig', [
            'invalidFixtures' => $fixturesToUpdate,
            'upcomingFixtures' => $upcomingFixtures,
            'fixturesWithoutDate' => $fixturesWithoutDate,
        ]);
    }
}
