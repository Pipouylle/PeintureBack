<?php

namespace App\Repository;

use App\Entity\ArticleCouche;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use phpDocumentor\Reflection\Types\This;

/**
 * @extends ServiceEntityRepository<ArticleCouche>
 */
class ArticleCoucheRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleCouche::class);
    }

    //    /**
    //     * @return ArticleCouche[] Returns an array of ArticleCouche objects
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

    //    public function findOneBySomeField($value): ?ArticleCouche
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findArticleCoucheForDemande(int $commandeId): array
    {
        return $this->createQueryBuilder('a')
            ->select('a')
            ->join('a.commande_articleCouche', 'commande')
            ->leftJoin('a.articles_articleCouche', 'article')
            ->join('a.couche_articleCouche', 'couche')
            ->andWhere('commande.id = :commandeId')
            ->setParameter('commandeId', $commandeId)
            ->getQuery()
            ->getResult();
    }

    public function getBySystemeIdAndCommandeId(int $systemeId, int $commandeId): array
    {
        return $this->createQueryBuilder('ac')
            ->join('ac.commande_articleCouche', 'commande')
            ->leftJoin('ac.articles_articleCouche', 'article')
            ->join('ac.couche_articleCouche', 'couche')
            ->join('couche.systeme_couche', 'systeme')
            ->andWhere('systeme.id = :systemeId')
            ->andWhere('commande.id = :commandeId')
            ->setParameter('systemeId', $systemeId)
            ->setParameter('commandeId', $commandeId)
            ->getQuery()
            ->getResult();
    }
}
