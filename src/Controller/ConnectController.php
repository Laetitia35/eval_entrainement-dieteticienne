<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConnectController extends AbstractController
{
    #[Route('/se_connecter', name: 'app_connect')]
    public function index(): Response
    {
        return $this->render('connect/index.html.twig');
    }
}
