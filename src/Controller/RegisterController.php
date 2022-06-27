<?php

namespace App\Controller;

use App\Entity\Formateurs;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/inscription", name="app_register")
     */
    public function index(Request $request, UserPasswordEncoderInterface $encoder): Response
    {

        $formateur = new Formateurs();
        $form = $this->createForm(RegisterType::class, $formateur);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $formateur = $form->getData();

            /* j'encode le mot de passe  */
            $password = $encoder->encodePassword($formateur,$formateur->getPassword());
            $formateur->setPassword($password);

            $this->entityManager->persist($formateur);
            $this->entityManager->flush();


            // Afficher message de succes de création de compte
            $this->addFlash('success', "Votre compte a été crée avec succès , un administrateur validera votre compte.");

            return $this->redirectToRoute('app_home');
        }

        return $this->render('register/index.html.twig', [
            'form' => $form->createView()

        ]);
    }
}
