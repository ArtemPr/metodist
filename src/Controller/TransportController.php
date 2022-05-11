<?php

namespace App\Controller;

use App\Entity\TrainingCenters;
use App\Entity\TrainingCentersRequisites;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TransportController extends AbstractController
{
    #[Route('/transport/training_center', name: 'app_transport')]
    public function index(ManagerRegistry $doctrine): Response
    {

        return $this->render('transport/index.html.twig', [
            'controller_name' => 'TransportController',
        ]);
    }
}
