<?php

namespace App\Controller;

use App\Entity\Stadium;
use App\Form\StadiumType;
use App\Repository\StadiumRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/stadium')]
final class StadiumController extends AbstractController
{
    #[Route(name: 'app_stadium_index', methods: ['GET'])]
    public function index(StadiumRepository $stadiumRepository): Response
    {
        return $this->render('stadium/index.html.twig', [
            'stadiums' => $stadiumRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_stadium_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $stadium = new Stadium();
        $form = $this->createForm(StadiumType::class, $stadium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($stadium);
            $entityManager->flush();

            return $this->redirectToRoute('app_stadium_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('stadium/new.html.twig', [
            'stadium' => $stadium,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_stadium_show', methods: ['GET'])]
    public function show(Stadium $stadium): Response
    {
        return $this->render('stadium/show.html.twig', [
            'stadium' => $stadium,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_stadium_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Stadium $stadium, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(StadiumType::class, $stadium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_stadium_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('stadium/edit.html.twig', [
            'stadium' => $stadium,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_stadium_delete', methods: ['POST'])]
    public function delete(Request $request, Stadium $stadium, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stadium->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($stadium);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_stadium_index', [], Response::HTTP_SEE_OTHER);
    }
}
