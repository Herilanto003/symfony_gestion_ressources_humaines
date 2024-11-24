<?php

namespace App\Form;

use App\Entity\Candidat;
use App\Entity\Job;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('lastname', TextType::class, [
            'label' => 'Nom',
            'attr' => [
                'placeholder' => 'nom de l\'agent'
            ]
        ])
        ->add('firstname', TextType::class, [
            'label' => 'Prenom',
            'attr' => [
                'placeholder' => 'prenom de l\'agent'
            ]
        ])
        ->add('birthDate', null, [
            'widget' => 'single_text',
            'label' => 'Date de naissance'
        ])
        ->add('birthPlace', TextType::class, [
            'label' => 'Lieu de naissance',
            'attr' => [
                'placeholder' => 'lieu de naissance'
            ]
        ])
        ->add('genre', ChoiceType::class, [
            'label' => 'Genre',
            'choices' => [
                'Homme' => 'M',
                'Femme' => 'F',
            ],
            'expanded' => true,  // Affiche les choix sous forme de boutons radio
            'multiple' => false, // Permet une seule sélection
        ])
        ->add('cin', TextType::class, [
            'label' => 'CIN',
            'attr' => [
                'placeholder' => 'numero de CIN'
            ]
        ])
        ->add('phone', TextType::class, [
            'label' => 'Numero telephone',
            'attr' => [
                'placeholder' => 'numero telephone'
            ]
        ])
        ->add('email', EmailType::class, [
            'label' => 'Email',
            'attr' => [
                'placeholder' => 'email de l\'agent'
            ]
        ])
        ->add('category', IntegerType::class, [
            'label' => 'Categorie',
            'attr' => [
                'placeholder' => 'son categorie'
            ]
        ])
        ->add('diplome', TextType::class, [
            'label' => 'Diplome',
            'attr' => [
                'placeholder' => 'diplome de l\'agent'
            ]
        ])
        ->add('specialisation', TextType::class, [
            'label' => 'Specialisation',
            'attr' => [
                'placeholder' => 'specialisation de l\'agent'
            ]
        ])
        ->add('situation', TextType::class, [
            'label' => 'Situation matrimoniale',
            'attr' => [
                'placeholder' => 'situation matrimoniale'
            ]
        ])
        ->add('job', EntityType::class, [
            'class' => Job::class,
            'choice_label' => function (Job $job) {
                return sprintf('%s', $job->getTitle());
            },
            'label' => 'Fonction actuelle'
        ])
        ->add('place', TextType::class, [
            'label' => 'Lieu',
            'attr' => [
                'placeholder' => 'Lieu'
            ]
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
        ]);
    }
}
