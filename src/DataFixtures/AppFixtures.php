<?php

namespace App\DataFixtures;

use App\Entity\Affectation;
use App\Entity\Agent;
use App\Entity\Candidat;
use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $diplome = ['CEPE', 'BEPC', 'BACC', 'LICENCE', 'MASTER', 'DOCTORAT'];
        $grades = ['Directeur', 'Manager', 'Assistant', 'Superviseur', 'Employé'];

        // Création des 25 jobs
        $jobs = []; // Tableau pour stocker les jobs créés
        for ($i = 0; $i < 25; $i++) {
            $job = new Job();
            $job->setTitle($faker->jobTitle());
            $manager->persist($job);

            // Ajouter le job dans le tableau pour usage ultérieur
            $jobs[] = $job;
        }

        $manager->flush();

        // Création des 25 agents
        $agents = [];
        for ($i = 0; $i < 25; $i++) {
            $agent = new Agent();

            // Générer un numéro matricule unique
            $matricule = 'AG-' . $faker->unique()->regexify('[A-Z0-9]{6}');

            // Remplir les données de l'agent
            $agent->setFirstname($faker->firstName());
            $agent->setLastname($faker->lastName());
            $agent->setBirthDate($faker->dateTimeBetween('-60 years', '-30 years'));
            $agent->setPhone($faker->phoneNumber());
            $agent->setEmail($faker->email());
            $agent->setImatricule($matricule);
            $agent->setCin($faker->numberBetween(444444444444, 666666666666));
            $agent->setCategory($faker->numberBetween(1, 8));
            $agent->setGrade($faker->randomElement($grades));
            $agent->setGenre($faker->randomElement(['M', 'F']));
            $agent->setDiplome($faker->randomElement($diplome));
            $agent->setSpecialisation($faker->jobTitle());
            $agent->setService($faker->jobTitle());
            $agent->setMinistere($faker->randomElement(['Centrale', 'Regionale']));
            $agent->setDirection($faker->randomElement(['Centrale', 'Regionale']));
            $agent->setSituation($faker->randomElement(['Marié', 'Célibataire']));
            $agent->setBirthPlace($faker->country());
            $agent->setPlace($faker->country());

            // Associer un job aléatoire à l'agent depuis les jobs créés
            $agent->setJob($faker->randomElement($jobs));

            $manager->persist($agent);

            $agents[] = $agent;
        }

        $manager->flush();
        

        // Création des 25 candidats
        for ($i = 0; $i < 25; $i++) {
            $candidat = new Candidat();

            // Remplir les données de l'candidat
            $candidat->setFirstname($faker->firstName());
            $candidat->setLastname($faker->lastName());
            $candidat->setBirthDate($faker->dateTimeBetween('-60 years', '-30 years'));
            $candidat->setPhone($faker->phoneNumber());
            $candidat->setEmail($faker->email());
            $candidat->setCategory($faker->numberBetween(1, 8));
            $candidat->setCin($faker->numberBetween(444444444444, 666666666666));
            $candidat->setGenre($faker->randomElement(['M', 'F']));
            $candidat->setDiplome($faker->randomElement($diplome));
            $candidat->setSpecialisation($faker->jobTitle());
            $candidat->setSituation($faker->randomElement(['Marié', 'Célibataire']));
            $candidat->setBirthPlace($faker->country());
            $candidat->setPlace($faker->country());

            // Associer un job aléatoire à l'candidat depuis les jobs créés
            $candidat->setJob($faker->randomElement($jobs));

            $manager->persist($candidat);
        }

        $manager->flush();

        // Creation des 25 affectation
        for ($i = 0; $i < 25; $i++) {
            $affectation = new Affectation();

            $affectation->setCause($faker->sentence(6));
            $affectation->setPlace($faker->country());
            $affectation->setAgent($faker->unique()->randomElement($agents));

            $manager->persist($affectation);
        }

        $manager->flush();
    }
}
