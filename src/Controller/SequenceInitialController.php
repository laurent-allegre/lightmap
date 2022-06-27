<?php

namespace App\Controller;

use App\Entity\Parcours;
use App\Entity\SpositionInitial;
use App\Form\SequenceInitialType;
use App\Repository\ObjectifCompetenceRepository;
use App\Repository\ParcoursRepository;
use App\Repository\PreRequisRepository;
use App\Repository\SpositionInitialRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SequenceInitialController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/sequence/initial/{id}", name="app_sequence_initial", requirements={"id":"\d+"})
     *
     */
    public function Ajouter(int $id, Request $request, EntityManagerInterface $entityManager, ParcoursRepository $parcoursRepository): Response
    {
        $parcours = $parcoursRepository->find($id);

        $sequence = new SpositionInitial();

        $form = $this->createForm(SequenceInitialType::class, $sequence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $sequence-> setParcour ($parcours);
            $entityManager->persist($sequence);
            $entityManager->flush();

            // Affichage d'un message de confirmation
            $this->addFlash('success', "Votre séquence de positionnement initial a bien été enregistrée.");

            return $this->redirectToRoute('app_sequence_liste',['id' => $parcours->getId()]);



        }
        /*On récupere le parcours par sont Id pour avoir toutes les informations du parcours*/
        $parcours = $this->entityManager->getRepository(Parcours::class)->find($id);

        return $this->render('sequences/initial.html.twig', [
           'parcours' => $parcours,
           'formInitial' => $form->createView()

        ]);
    }


    /**
     * @Route("/sequence/initial/modifier/{id}", name="app_sequence_initial_modifier", requirements={"id":"\d+"})
     */
    public function Modifier(int $id, Request $request, EntityManagerInterface $entityManager, ParcoursRepository $parcoursRepository,
                             SpositionInitialRepository $initialRepository, PreRequisRepository $preRequisRepository,
                             ObjectifCompetenceRepository $competenceRepository): Response
    {
        $parcours = $parcoursRepository->find($id);
        $sequence = $initialRepository->find($id);

        /*   ON BOUCLE SUR TOUS LES PREREQUIS AFIN DE LES ENVOYER A TWIG */
        foreach ($parcours-> getSpositionInitials() as $spositionInitial) {
            $tousLesPrerequis = $preRequisRepository-> findBy(array("PositionInitial" => $spositionInitial-> getId() ));

            $tousLesObjectifs = $competenceRepository-> findBy(array("objectifInitial" => $spositionInitial-> getId() ));

            foreach ($tousLesPrerequis as $prerequi) {
                $spositionInitial->addPreRequi($prerequi);
            }
            foreach ($tousLesObjectifs as $objectif) {
                $spositionInitial->addObjectifCompetence($objectif);
            }
        }

        $form = $this->createForm(SequenceInitialType::class, $sequence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $sequence-> setParcour ($parcours);
           // $entityManager->persist($sequence);
            $entityManager->flush();

            // Affichage d'un message de confirmation
            $this->addFlash('success', "Votre séquence de positionnement initial a bien été enregistrée.");

            return $this->redirectToRoute('app_sequence_liste',['id' => $parcours->getId()]);



        }
        /*On récupere le parcours par sont Id pour avoir toutes les informations du parcours*/
        $parcours = $this->entityManager->getRepository(Parcours::class)->find($id);

        return $this->render('sequences/initial/modifier.html.twig', [
            'parcours' => $parcours,
            'formInitial' => $form->createView()
        ]);
    }
}
