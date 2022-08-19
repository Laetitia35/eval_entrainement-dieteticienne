<?php

namespace App\Controller;
use App\Entity\User;
use App\Form\RegisterAdminType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterAdminController extends AbstractController
{
    #[Route('/inscription', name: 'app_register_admin')]
    public function index(): Response
    {
        $user = new User();
        $form = $this->createForm(RegisterAdminType::class, $user);

        return $this->render('register_admin/index.html.twig', [
            'form' => $form->createView(),
            '$passwordGenerator->generateRandomStrongPassword(20)',
        ]);
    }
}
