<?php

namespace App\Controller;

use App\Form\AddPetFoodType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Composition;

class AddPetFoodController extends AbstractController
{
    /**
     * @Route("/ajouter-un-aliment")
     */
    public function newPetfood(EntityManagerInterface $entityManager, Request $request) {

        $petfood = new Composition();
        $form = $this->createForm(AddPetFoodType::class,$petfood);

        // Récupère la requête uniquement si la méthode du formulaire est "post"
        $form->handleRequest($request);

        // Si le formulaire est envoyé et qu'il est valide (si les champs obligatoires sont remplis..
        // si ce n'est pas le cas, cette étape est sautée pour arriver directement au return
        //(donc l'affichage de la page avec le formulaire)

        if ($form->isSubmitted() && $form->isValid()) {
            // On envoie l'article en base de données grâce aux méthodes persist(objet) + flush // persist + flush est l'équivalent de commit + push de Git.
            $entityManager->persist($petfood); $entityManager->flush();
        }

    return $this->render('front/form_add_petfood.html.twig', [
            'addPetFoodForm' => $form->createView() ]);
    }

}