<?php

namespace App\Form;

use App\Model\CandidatValidation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatValidateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imatricule', TextType::class, [
                'label' => 'Immatricule',
                'attr' => [
                    'placeholder' => 'numero immatricule'
                ],
            ])
            ->add('grade', TextType::class, [
                'label' => 'Corps',
                'attr' => [
                    'placeholder' => 'le grade'
                ],
            ])
            ->add('service', TextType::class, [
                'label' => 'Service',
                'attr' => [
                    'placeholder' => 'le service'
                ],
            ])
            ->add('ministere', ChoiceType::class, [
                'label' => 'Ministère',
                'choices' => [
                    'Centrale' => 'Centrale',
                    'Régionale' => 'Regionale',
                ],
                'placeholder' => '-- Choisir un type de ministère --',
                'expanded' => false, // false pour un menu déroulant
                'multiple' => false, // false pour une sélection unique,
            ])
            ->add('direction', ChoiceType::class, [
                'label' => 'Direction',
                'choices' => [
                    'Centrale' => 'Centrale',
                    'Régionale' => 'Regionale',
                ],
                'placeholder' => '-- Choisir un type de direction --',
                'expanded' => false, // false pour un menu déroulant
                'multiple' => false, // false pour une sélection unique,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' => CandidatValidation::class,
        ]);
    }
}
