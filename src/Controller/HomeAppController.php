<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeAppController extends AbstractController
{
    /*
     * @Route("/test", name="index")
     */

    // --- Creation de la vue pour la page d'accueil

    public function ShowIndex()
    {
        return $this->render('index.html.twig');
    }

}