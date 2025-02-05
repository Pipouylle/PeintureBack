<?php

namespace App\Repository;

use App\Entity\Couches;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Couches>
 */
class CouchesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Couches::class);
    }

//    /**
//     * @return Couches[] Returns an array of Couches objects
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

//    public function findOneBySomeField($value): ?Couches
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function findByDemandeId($demandeId): array
    {
        return $this->createQueryBuilder('c')
            ->select('a.id')
            ->join('c.codeArticle_couche', 'a')
            ->join('c.surfaceCouches_couche', 'sc')
            ->join('sc.demande_surfaceCouche', 'd')
            ->where('d.id = :demandeId')
            ->setParameter('demandeId', $demandeId)
            ->getQuery()
            ->getResult();
    }
}
