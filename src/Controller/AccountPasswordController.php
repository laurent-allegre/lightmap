<?php

namespace App\Controller;

use App\Form\ChangePasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AccountPasswordController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/compte/modification-password", name="app_account_password")
     */
    public function index(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        /*Message de validation */
        $notification = null;

        $formateur = $this->getUser();
        $form = $this->createForm(ChangePasswordType::class, $formateur);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
          /*On récupere l'ancien mot de passe*/
            $old_pwd = $form->get('old_password')->getData();
          /*On compare les mots de passe*/
            if ($encoder->isPasswordValid($formateur,$old_pwd)){
          /*On récupere le nouveau mot de passe*/
                $new_pwd = $form->get('new_password')->getData();
                $password = $encoder->encodePassword($formateur, $new_pwd);

                $formateur->setPassword($password);

                $this->entityManager->flush();
                $notification = "Votre mot de passe a bien été mis à jour.";
            }else{
                $notification = "Votre mot de passe actuel n'est pas valide.";
            }

        }

        return $this->render('account/password.html.twig', [
            'form' => $form->createView(),
            'notification' => $notification
        ]);
    }
}
