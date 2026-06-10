<?php

namespace App\Controller;

use App\Entity\Car;
use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/car')]
final class CarController extends AbstractController
{
    public function __construct(
        private CarRepository $carRepository, 
        private EntityManagerInterface $entityManager
        )
    {
        
    }
    #[Route('/{id}', name: 'car_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(int $id): Response
    {
        $car = $this->carRepository->find($id);

        if (!$car) {
            throw $this->createNotFoundException('Cette voiture n\'existe pas.');
        }

        return $this->render('car/index.html.twig', [
            'car' => $car,
        ]);
    }

    #[Route('/{id}/delete', name: 'car_delete', requirements: ['id' => '\d+'], methods: ['POST'])]
    public function delete(int $id): Response
    {
        $car = $this->carRepository->find($id);

        if (!$car) {
            throw $this->createNotFoundException('Cette voiture n\'existe pas.');
        }

        $this->entityManager->remove($car);
        $this->entityManager->flush();

        return $this->redirectToRoute('app_main');
    }
}
