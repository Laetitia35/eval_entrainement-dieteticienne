<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form ->isValid()) {
            $this->addFlash('notice', "Merci de m'avoir contacter. Je vous répond dans les meilleurs délais.");

            // dd($formData['nom']);
            $content = "Bonjour </br>Vous avez reçus un message de <strong>".$form->getData()['prenom']." ".$form->getData()['nom']."</strong></br>Adresse email : <strong>".$form->getData()['email']."</strong> </br>Message : ".$form->getData()['content']."</br></br>"; 

            $mail = new Mail();
            $mail->send('contact@sandrine-coupart.fr', 'Sandrine Coupart', 'Vous avez reçu une demande de contact');
        }

        return $this->render('contact/index.html.twig', [
            'form' =>$form->createView()
        ]);
    }
}
