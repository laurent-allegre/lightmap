<?php

namespace App\Controller;

use App\Entity\Formateurs;
use App\Form\EditFormateursType;
use App\Repository\FormateursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin", name="admin_")
 */
class AdminController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/admin", name="app_admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * liste des formateurs
     * @Route("/formateurs", name="formateurs")
     */
    public function formateursList(FormateursRepository $formateurs) {
        return $this->render("admin/formateurs.html.twig", [
            'formateurs' => $formateurs->findAll()
        ]);

    }

    /**
     * Modifier le role formateur
     * @Route("/formateurs/modifier/{id}", name="modifier_formateurs", requirements={"id":"\d+"})
     */
    public function editformateurs(Formateurs $formateurs, Request $request){
        $form = $this->createForm(EditFormateursType::class, $formateurs);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $this->entityManager->persist($formateurs);
            $this->entityManager->flush();

            $this->addFlash('message', "le formateur à été modifié avec succès.");
            return $this->redirectToRoute('admin_formateurs');
        }

        # on crée la vue du formulaire #
        return $this->render('admin/editFormateurs.html.twig', [
            'formateurForm' => $form->createView()
        ]);

    }
}
