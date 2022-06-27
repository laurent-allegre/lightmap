<?php

namespace App\Controller;

use App\Entity\SequenceReflexive;
use App\Form\SequenceReflexiveType;
use App\Repository\ParcoursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SequenceReflexiveController extends AbstractController
{
    /**
     * @Route("/sequence/reflexive/{id}", name="app_sequence_reflexive", requirements={"id":"\d+"})
     */
    public function ajouter(int $id, Request $request, EntityManagerInterface $entityManager, ParcoursRepository $parcoursRepository): Response
    {
        $parcours = $parcoursRepository->find($id);

        $sequence = new SequenceReflexive();
        $form = $this->createForm(SequenceReflexiveType::class, $sequence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $sequence-> setParcour ($parcours);
            $entityManager->persist($sequence);
            $entityManager->flush();

            // Affichage d'un message de confirmation
            $this->addFlash('success', "Votre séquence réflexive a bien été enregistrée.");

            return $this->redirectToRoute('app_sequence_liste',['id' => $parcours->getId()]);
        }


        return $this->render('sequences/sequenceReflexive.html.twig', [
            'parcours' => $parcours,
            'form' => $form->createView()
        ]);
    }
}
