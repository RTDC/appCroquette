<?php

namespace App\Controller;

use App\Repository\CompositionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeAppController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function home()
    {
        return $this->render('index.html.twig');
    }
    /**
     * @Route("/show", name="show_all")
     */
    // je demande à Symfony de m'instancier la classe CompositionRepository avec le mécanisme d'Autowire (je passe en paramètre de la méthode
    // la classe voulue suivie d'une variable dans laquelle je veux que Symfony m'instancie ma classe l'authorRepository est la classe qui permet de faire des requêtes SELECT
    // dans la table authors
    public function PetFoodList(CompositionRepository $compositionRepository)
    {

        // j'utilise l'bookRepository et la méthode findAll() pour récupérer tous les éléments de ma table composition
        $petfoods = $compositionRepository->findAll();

        return $this->render('front/show_all.html.twig', [
            'petfoods' => $petfoods
        ]);
    }

}