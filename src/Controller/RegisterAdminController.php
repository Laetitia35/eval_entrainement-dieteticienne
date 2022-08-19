<?php

namespace App\Controller;
use App\Entity\User;
use App\Form\RegisterAdminType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class RegisterAdminController extends AbstractController
{
     
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    #[Route('/inscription', name: 'app_register_admin')]
    public function index(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(RegisterAdminType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $user = $form->getData();

            $this->entityManager->persist($user);
            $this->entityManager->flush();
        }

        return $this->render('register_admin/index.html.twig', [
            'form' => $form->createView(),
            '$passwordGenerator->generateRandomStrongPassword(20)',
        ]);
    }
}
