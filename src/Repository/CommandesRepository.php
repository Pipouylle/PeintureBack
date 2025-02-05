<?php

namespace App\Repository;

use App\Entity\Commandes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Commandes>
 */
class CommandesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commandes::class);
    }

//    /**
//     * @return Commandes[] Returns an array of Commandes objects
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

//    public function findOneBySomeField($value): ?Commandes
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function CommandesAffairesSystemes(): array
    {
        return $this->createQueryBuilder('c')
            ->select('c', 'a', 's')
            ->Join('c.idAffaire_commande', 'a', 'WITH', 'c.idAffaire_commande = a.id')
            ->Join('c.idSysteme_commande', 's', 'WITH', 'c.idSysteme_commande = s.id')
            ->getQuery()
            ->getArrayResult();
    }
}
