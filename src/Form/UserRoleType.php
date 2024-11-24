<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Model\UserRole;

class UserRoleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('role', ChoiceType::class, [
                'label' => 'Role',
                'choices' => [
                    'DRH' => 'ROLE_DRH',
                    'PERSONNEL' => 'Regionale',
                ],
                'placeholder' => '-- Choisir un type de direction --',
                'expanded' => false, // false pour un menu déroulant
                'multiple' => false, // false pour une sélection unique
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' => UserRole::class,
        ]);
    }
}
