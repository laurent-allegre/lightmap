<?php

namespace App\Controller;

use App\Entity\MiseEnSituation;
use App\Form\SequenceMiseEnSituationType;
use App\Repository\ParcoursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SequenceMiseEnSituationController extends AbstractController
{
    /**
     * @Route("/sequence/mise/en/situation/{id}", name="app_sequence_mise_en_situation", requirements={"id":"\d+"})
     */
    public function Ajouter(int $id, Request $request, EntityManagerInterface $entityManager, ParcoursRepository $parcoursRepository): Response
    {
        $parcours = $parcoursRepository->find($id);

        $sequence = new MiseEnSituation();

        $form = $this->createForm(SequenceMiseEnSituationType::class, $sequence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $sequence-> setParcour ($parcours);
            $entityManager->persist($sequence);
            $entityManager->flush();

            // Affichage d'un message de confirmation
            $this->addFlash('success', "Votre séquence de mise en situation a bien été enregistrée.");

            return $this->redirectToRoute('app_sequence_liste',['id' => $parcours->getId()]);
        }


        return $this->render('sequences/miseEnSituation.html.twig', [
            'parcours' => $parcours,
            'form' => $form->createView()
        ]);
    }
}
