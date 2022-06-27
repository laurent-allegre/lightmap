<?php

namespace App\Controller;

use App\Entity\Parcours;
use App\Entity\PreRequis;
use App\Entity\Scomplementaire;
use App\Form\SequenceComplementaireType;

use App\Repository\ParcoursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\Translation\t;

class SequencesController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/sequences/complementaire/{id}", name="app_sequences_complementaire", requirements={"id":"\d+"})
     */
    public function ajouter(int $id, Request $request, EntityManagerInterface $entityManager, ParcoursRepository $parcoursRepository): Response
    {
        $parcours = $parcoursRepository->find($id);

        $sequence = new Scomplementaire();

        /*
        // dummy code - add some example tags to the task
        // (otherwise, the template will render an empty list of tags)
        $tag1 = new PreRequis();
        $tag1->setLibellerRequis('tag1');
        $sequence->add($tag1);
        $tag2 = new PreRequis();
        $tag2->setLibellerRequis('tag2');
        $sequence->add($tag2);
        // end dummy code
*/

        $form = $this->createForm(SequenceComplementaireType::class, $sequence);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()){

            $sequence-> setParcour ($parcours);
            $entityManager->persist($sequence);
            $entityManager->flush();

            // Affichage d'un message de confirmation
            $this->addFlash('success', "Votre séquence complémentaire a bien été enregistrée.");

            return $this->redirectToRoute('app_sequence_liste',['id' => $parcours->getId()]);

        }

        /*On récupere le parcours par sont Id pour avoir toutes les informations du parcours*/
        $parcours = $this->entityManager->getRepository(Parcours::class)->find($id);

        return $this->render('sequences/complementaire.html.twig', [
            'parcours' => $parcours,
            'form' => $form->createView()
        ]);
    }
}
