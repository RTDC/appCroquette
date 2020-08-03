<?php


namespace App\Controller\admin;


use App\Form\AddPetFoodType;
use App\Entity\Composition;
use App\Repository\CompositionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class AdminUpdateProduct extends AbstractController
{
    /**
     * @Route("/administration/update/product/{id}", name="admin_update_product_update")
     */
    public function AdminUpdateProduct(
        Request $request,
        CompositionRepository $compositionRepository,
        EntityManagerInterface $entityManager,
        $id,
        SluggerInterface $slugger
    ){
        //une nouvelle instance
        //dans laquelle on attribut le livre trouvé selon l'id
        $product = $compositionRepository->find($id);
        //recupération du gabarit de formulaire
        //créé avec la commande make:form que je stock dans une variable
        $petfoodFormUpdate=$this->createForm(AddPetFoodType::class, $product);
        //je prends les données de la requete et je les envois au formulaire
        $petfoodFormUpdate->handleRequest($request);
        //si le formulaire a ete envoyé et que les données sont valides...
        if ($petfoodFormUpdate->isSubmitted() && $petfoodFormUpdate->isValid()){
            // vu que le champs image du produit de mon formulaire est en mapped false
            // je gère moi même l'enregistrment de la valeur de cet input

            // je récupère l'image uploadée, le nom et la marque
            $packaging = $petfoodFormUpdate->get('image')->getData();
            $brand = $petfoodFormUpdate->get('brand')->getData();
            $name = $petfoodFormUpdate->get('name')->getData();

            // s'il y a bien une image uploadée dans le formulaire
            if ($packaging){

                // je gènère un nouveau qui sera unique en nettoyant l'url
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
                $uniqueCoverName = $uniqueCoverName . '.' . $packaging->guessExtension();

                //j'utilise un bloc try and catch
                //qui agit comme une condition, mais si le bloc try échoue, ça soulève une erreur grace au catch
                try {
                    // je prends l'image uploadée
                    // et je la déplace dans un dossier (dans public) + je la renomme avec
                    // le nom unique générée
                    // j'utilise un parametre (défini dans services.yaml) pour savoir
                    // dans quel dossier je la déplace
                    // un parametre = une sorte de variable globale
                    $packaging->move(
                        $this->getParameter('packaging'),
                        $uniqueCoverName
                    );
                }catch (FileException $e){
                    return new Response(($e->getMessage()));
                }

                //je sauvegarde dans la colonne image le nom de mon image
                $product->setImage($uniqueCoverName);
            }
            //... alors je persist et flush le livre
            $entityManager->persist($product);
            $entityManager->flush();
            $this->addFlash('success', 'Votre image produit a été mis à jour !');
            return $this->redirectToRoute('show_all');
        }
        //je renvois le fichier twig
        return $this->render( 'admin/update_product.html.twig', [
            'petfoodFormUpdate'=>$petfoodFormUpdate->createView()
        ]);
    }
}