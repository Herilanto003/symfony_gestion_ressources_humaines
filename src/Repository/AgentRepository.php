<?php

namespace App\Repository;

use App\Entity\Agent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Agent>
 */
class AgentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Agent::class);
    }

    //    /**
    //     * @return Agent[] Returns an array of Agent objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Agent
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function getDiplomeCounts(): array
    {
        $entityManager = $this->getEntityManager();

        // Requête DQL pour regrouper par diplome et compter les occurrences
        $query = $entityManager->createQuery(
            'SELECT a.diplome AS diplome, COUNT(a.id) AS count
             FROM App\Entity\Agent a
             GROUP BY a.diplome
             ORDER BY count DESC'
        );

        return $query->getResult();
    }

    public function getTotalAgents(): int
    {
        $entityManager = $this->getEntityManager();

        // Requête DQL pour compter le nombre total d'agents
        $query = $entityManager->createQuery(
            'SELECT COUNT(a.id)
            FROM App\Entity\Agent a'
        );

        // Retourner le résultat du comptage
        return (int) $query->getSingleScalarResult();
    }

}
