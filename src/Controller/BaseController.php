<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{
    public function baseRender(string $tpl, array $data = null)
    {
        $user = $this->getUser();
        $data['user'] = [
            'username' => $user->name,
            'roles' => $user->getRoles(),
        ];

        return $this->render($tpl, $data);
    }
}
