<?php

namespace App\Controller;

use App\Form\AddPetFoodType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Composition;
use Symfony\Component\String\Slugger\SluggerInterface;

class AddPetFoodController extends AbstractController
{
    /**
     * @Route("/ajouter-un-aliment", name="add_petfood")
     */
    public function newPetfood(EntityManagerInterface $entityManager, Request $request, SluggerInterface $slugger) {

        $petfood = new Composition();
        $form = $this->createForm(AddPetFoodType::class,$petfood);

        // Récupère la requête uniquement si la méthode du formulaire est "post"
        $form->handleRequest($request);

        // Si le formulaire est envoyé et qu'il est valide (si les champs obligatoires sont remplis..
        // si ce n'est pas le cas, cette étape est sautée pour arriver directement au return
        //(donc l'affichage de la page avec le formulaire)

        if ($form->isSubmitted() && $form->isValid()) {

            // je récupère l'image uploadée
            $bookCoverFile = $form->get('image')->getData();
            $brand = $form->get('brand')->getData();
            $name = $form->get('name')->getData();

            // s'il y a bien une image uploadée dans le formulaire
            if ($bookCoverFile) {

                // grâce à son nom original, je gènère un nouveau qui sera unique
                // pour éviter d'avoir des doublons de noms d'image en BDD
                $uniqueCoverName = $name .'-'.$brand .'-'. uniqid();
                $uniqueCoverName = strtolower($uniqueCoverName);
                //Suppression des accents pour clarifier l'url
                //Suppression des espaces et caracteres spéciaux
                $uniqueCoverName = str_replace(" ",'-',$uniqueCoverName);
                $uniqueCoverName = preg_replace('#([^a-z0-9-])#','-',$uniqueCoverName);
                //Suppression des tirets multiples
                $uniqueCoverName = preg_replace('#([-]+)#','-',$uniqueCoverName);
                //Suppression du premier caractère si c'est un tiret
                if($uniqueCoverName{0} == '-')
                    $uniqueCoverName = substr($uniqueCoverName,1);
                //Suppression du dernier caractère si c'est un tiret
                if(substr($uniqueCoverName, -1, 1) == '-')
                    $uniqueCoverName= substr($uniqueCoverName, 0, -1);
                $uniqueCoverName = filter_var(strip_tags($uniqueCoverName), FILTER_SANITIZE_URL);
                $uniqueCoverName = $uniqueCoverName . '.' . $bookCoverFile->guessExtension();


                try {

                    $bookCoverFile->move(
                        $this->getParameter('packaging'),
                        $uniqueCoverName
                    );
                } catch (FileException $e) {
                    return new Response($e->getMessage());
                }


                // je sauvegarde dans la colonne bookCover le nom de mon image
                $petfood->setImage($uniqueCoverName);
            }

            // On envoie l'article en base de données grâce aux méthodes persist(objet) + flush // persist + flush est l'équivalent de commit + push de Git.
            $entityManager->persist($petfood); $entityManager->flush();
        }

    return $this->render('front/form_add_petfood.html.twig', [
            'addPetFoodForm' => $form->createView() ]);
    }

}