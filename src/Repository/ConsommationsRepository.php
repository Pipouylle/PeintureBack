<?php

namespace App\Repository;

use App\Entity\Consommations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Consommations>
 */
class ConsommationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Consommations::class);
    }

//    /**
//     * @return Consommations[] Returns an array of Consommations objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Consommations
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
    public function findBySemaine(int $semaine): array
    {
        return $this->createQueryBuilder('c')
            ->Select('c')
            ->join('c.of_consommation', 'o')
            ->andWhere('o.semaine_of = :semaine')
            ->setParameter('semaine', $semaine)
            ->getQuery()
            ->getResult();
    }
}
