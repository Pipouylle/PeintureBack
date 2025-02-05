<?php

namespace App\Repository;

use App\Entity\Demandes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Demandes>
 */
class DemandesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Demandes::class);
    }

//    /**
//     * @return Demandes[] Returns an array of Demandes objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Demandes
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function findDemandesForCalendar(): array
    {
        return $this->createQueryBuilder('d')
            ->select('d', 'c', 'a', 's')
            ->join('d.idCommande_demande', 'c', 'WITH', 'd.idCommande_demande = c.id')
            ->join('c.idAffaire_commande', 'a', 'WITH', 'c.idAffaire_commande = a.id')
            ->join('c.idSysteme_commande', 's', 'WITH', 'c.idSysteme_commande = s.id')
            ->getQuery()
            ->getArrayResult();
    }
}
