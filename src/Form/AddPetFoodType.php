<?php

namespace App\Form;

use App\Entity\Composition;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AddPetFoodType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('percent_proteine')
            ->add('percent_fat')
            ->add('percent_ashes')
            ->add('brand')
            ->add('ean')
            ->add('humidity')
            ->add('ingredient_1')
            ->add('ingredient_2')
            ->add('ingredient_3')
            ->add('age', ChoiceType::class, [
                'choices' => [
                    'Adult' => 'adult',
                    'Puppy' => 'puppy',
                    'Senior' => 'senior',
                ],
            ])
            ->add('type', ChoiceType::class, [
            'choices' => [
                'Chien' => 'chien',
                'Chat' => 'chat',
            ],
            ])
            ->add('image', FileType::class, [
                'mapped' => false,
                'label' => 'Image du produit'
            ])
            ->add('weight')
            ->add('cellulose')

            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Composition::class,
        ]);
    }
}


