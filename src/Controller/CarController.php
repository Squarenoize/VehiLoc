<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/car')]
final class CarController extends AbstractController
{
    #[Route('/{id}', name: 'car_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(int $id, CarRepository $carRepository): Response
    {
        $car = $carRepository->find($id);

        if (!$car) {
            throw $this->createNotFoundException('Cette voiture n\'existe pas.');
        }

        return $this->render('car/index.html.twig', [
            'car' => $car,
        ]);
    }
}
