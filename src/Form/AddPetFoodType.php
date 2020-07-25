<?php

namespace App\Form;

use App\Entity\Composition;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddPetFoodType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('percent_proteine')
            ->add('percent_fat')
            ->add('percent_ashes')
            // j'ajoute le champs brand et je lui mets 'EntityType' en type de champs pour que symfony
            // créé une liste déroulante avec tous les genres existants en bdd
            ->add('brand')
            ->add('percent_carbohydrates')
            ->add('ean')
            ->add('ingredient_1')
            ->add('ingredient_2')
            ->add('ingredient_3')


            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Composition::class,
        ]);
    }
}


