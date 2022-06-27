<?php

namespace App\Controller;
use App\Entity\Parcours;
use App\Form\NewParcoursType;
use App\Repository\ObjectifCompetenceRepository;
use App\Repository\ParcoursRepository;
use App\Repository\PreRequisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewParcoursController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/parcours/nouveau", name="app_parcours_ajouter")
     */
    public function ajouter(Request $request, EntityManagerInterface $manager): Response
    {
        $parcour = new Parcours();

        $form = $this->createForm(NewParcoursType::class, $parcour);
        $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()){
                /* on integre l'id du formateur dans la base de donnée */
                $parcour->setFormateur($this->getUser());

                $manager->persist($parcour);
                $manager->flush();
                /* on affiche un message comme quoi l'insertion en Bdd à bien fonctionné */
                $this->addFlash('success', 'Votre parcours a bien été enregistré');

             return $this->redirectToRoute('app_sequence_liste',['id' => $parcour->getId()]);
            }

        return $this->render('parcours/index.html.twig', [
            'form' => $form->createView()
        ]);


    }

    /**
     * liste des Parcours
     * @Route("/parcours/liste", name="app_parcours_liste")
     */
    public function parcoursList( ParcoursRepository $parcoursRepository) {

            $formateur = $this->getUser();

        return $this->render("parcours/liste.html.twig", [
            'parcours' => $parcoursRepository->findby(["formateur" => $formateur-> getId()],['id' =>'DESC'])

        ]);

    }

    /**
     * Detail d'un parcours
     * @route("/parcours/details/{id}", name="app_parcours_details", requirements={"id":"\d+"})
     */
    public function details($id, ParcoursRepository $parcoursRepository, PreRequisRepository $preRequisRepository, ObjectifCompetenceRepository $competenceRepository) : Response {

        $parcour = $parcoursRepository->find($id);


       // $parcour-> setFormateur(($formateurRepository-> findBy(array("id"=> $parcour-> getFormateur()->getId())))[0]);
      /*   ON BOUCLE SUR TOUS LES PREREQUIS AFIN DE LES ENVOYER A TWIG */
        foreach ($parcour-> getSpositionInitials() as $spositionInitial) {
            $tousLesPrerequis = $preRequisRepository-> findBy(array("PositionInitial" => $spositionInitial-> getId() ));

            $tousLesObjectifs = $competenceRepository-> findBy(array("objectifInitial" => $spositionInitial-> getId() ));

            foreach ($tousLesPrerequis as $prerequi) {
                $spositionInitial->addPreRequi($prerequi);
            }
            foreach ($tousLesObjectifs as $objectif) {
                $spositionInitial->addObjectifCompetence($objectif);
            }
        }

        return $this->render('parcours/details.html.twig', [
            "parcour" => $parcour
        ]);

    }

    /**
     * Modification d'un parcours
     * @route("/parcours/{id}/modification", name="app_parcours_modification", requirements={"id":"\d+"})
     */
    public function modification($id, ParcoursRepository $parcoursRepository, Request $request, EntityManagerInterface $manager) : Response {

        $parcour = $parcoursRepository->find($id);
      //  $parcour = new Parcours();

        $form = $this->createForm(NewParcoursType::class, $parcour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            /* on integre l'id du formateur dans la base de donnée */
            $parcour->setFormateur($this->getUser());

          //  $manager->persist($parcour);
            $manager->flush();
            /* on affiche un message comme quoi l'insertion en Bdd à bien fonctionné */
            $this->addFlash('success', 'Votre parcours a bien été enregistré');

            return $this->redirectToRoute('app_sequence_liste',['id' => $parcour->getId()]);
        }

        return $this->render('parcours/modification.html.twig', [
            'form' => $form->createView(),
            "parcour" => $parcour
        ]);

        return $this->render('parcours/modification.html.twig', [
            "parcour" => $parcour,
        ]);

    }



    /**
     *  @Route("/delete/{id}", name="delete", requirements={"id":"\d+"})
     */
    public function delete(Parcours $parcours, EntityManagerInterface $entityManager) : Response
    {
        $entityManager->remove($parcours);
        $entityManager->flush();

        return $this->redirectToRoute('app_parcours_liste');
    }

    /**
     * liste des séquences
     * @Route("/parcours/sequence/liste/{id}", name="app_sequence_liste", requirements={"id":"\d+"})
     */
    public function listeSequences(int $id): Response
    {
        $parcours = $this->entityManager->getRepository(Parcours::class)->find($id);

        return $this->render('parcours/listeSequences.html.twig',[
            'parcours' => $parcours
        ]);
    }
}
