<?php

namespace App\Form;

use App\Entity\Affectation;
use App\Entity\Agent;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AffectationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('agent', EntityType::class, [
                'class' => Agent::class,
                'choice_label' => function(Agent $agent) {
                    return sprintf('%s %s', $agent->getLastname(), $agent->getFirstname());
                },
                'label' => 'Demandeur'
            ])
            ->add('cause', TextType::class, [
                'label'=> 'Cause d\'affectation',
                'attr' => [
                    'placeholder' => 'description de la cause'
                ]
            ])
            ->add('place',TextType::class, [
                'label'=> 'Lieu demandé',
                'attr' => [
                    'placeholder' => 'indiquer le lieu'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Affectation::class,
        ]);
    }
}
