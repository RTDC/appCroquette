<?php

namespace App\Controller\admin;

use App\Entity\Composition;
use App\Form\AddPetFoodType;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\CompositionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;

class admin_update_product extends AbstractController
{
    /**
     * @Route("/administration/update/product/{id}", name="admin_update_product_update")
     */
    public function AdminUpdateProduct(
        CompositionRepository $compositionRepository,
        Request $request,
        EntityManagerInterface $entityManager,
        $id
    )
    {
        $product = $compositionRepository->find($id);

        $addPetFoodForm = $this->createForm(AddPetFoodType::class, $product);

        $addPetFoodForm->handleRequest($request);

        if ($addPetFoodForm->isSubmitted() && $addPetFoodForm->isValid()) {
            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('show_all');
        }

        return $this->render('admin/update_product.html.twig', [
            'addPetFoodForm' => $addPetFoodForm->createView()
        ]);
    }
}