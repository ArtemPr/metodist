<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CabinetController extends BaseController
{
    #[Route('/cabinet', name: 'app_cabinet')]
    public function index(): Response
    {
        return $this->baseRender('cabinet/index.html.twig', [
            'controller_name' => 'app_cabinet',
        ]);
    }
}
