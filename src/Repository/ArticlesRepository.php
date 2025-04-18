<?php

namespace App\Repository;

use App\Entity\Articles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Articles>
 */
class ArticlesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Articles::class);
    }

//    /**
//     * @return Articles[] Returns an array of Articles objects
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

//    public function findOneBySomeField($value): ?Articles
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function findArticleCoucheByIdDemande($demandeId): array
    {
        return $this->createQueryBuilder('a')
            ->select('a', 'ac')
            ->join('a.articleCouches_article', 'ac')
            ->join('ac.surfaceCouches_articleCouche', 'sc')
            ->join('sc.demande_surfaceCouche', 'd')
            ->where('d.id = :demandeId')
            ->setParameter('demandeId', $demandeId)
            ->getQuery()
            ->getArrayResult();
    }
}
