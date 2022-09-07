<?php

namespace App\Controller;
use App\Entity\User;
use App\Form\RegisterAdminType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\PasswordGenerator;


class RegisterAdminController extends AbstractController
{
     
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }


    #[Route('/inscription', name: 'app_register_admin')]
    public function index(Request $request, UserPasswordHasherInterface $passwordHasher, PasswordGenerator $passwordGenerator): Response
    {
        $generator = print_r($passwordGenerator->generateRandomStrongPassword(20));

        $user = new User();
        $form = $this->createForm(RegisterAdminType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $user = $form->getData();

            $password = $passwordHasher->hashPassword($user, $user->getPassword());
            
            $user->setPassword($password);

            $this->entityManager->persist($user);
            $this->entityManager->flush();
        }

        return $this->render('register_admin/index.html.twig', [
            'form' => $form->createView(),
            'generator'=> $generator
           
            
        ]);
    }
}
