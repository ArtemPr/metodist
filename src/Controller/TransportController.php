<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TransportController extends AbstractController
{
    #[Route('/transport/training_center', name: 'app_transport')]
    public function index(): Response
    {
        $data = file_get_contents('http://metodistam.niidpo.ru/run_transport.php?t=training_centers');
        $data = json_decode($data);
        dd($data);
        return $this->render('transport/index.html.twig', [
            'controller_name' => 'TransportController',
        ]);
    }
}
