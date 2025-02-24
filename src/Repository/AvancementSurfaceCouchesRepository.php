<?php

namespace App\Repository;

use App\Entity\AvancementSurfaceCouches;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AvancementSurfaceCouches>
 */
class AvancementSurfaceCouchesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AvancementSurfaceCouches::class);
    }

//    /**
//     * @return AvancementSurfaceCouches[] Returns an array of AvancementSurfaceCouches objects
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

//    public function findOneBySomeField($value): ?AvancementSurfaceCouches
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function findBySemaine(int $semaineId): array
    {
        return $this->createQueryBuilder('a')
            ->join('a.of_avancement', 'of')
            ->join('of.semaine_of', 'semaine')
            ->andWhere('semaine.id = :val')
            ->setParameter('val', $semaineId)
            ->getQuery()
            ->getResult();
    }

    public function findByDemande(int $demandeId): array
    {
        return $this->createQueryBuilder('a')
            ->join('a.surfaceCouches_avancement', 's')
            ->join('s.demande_surfaceCouche', 'demande')
            ->andWhere('demande.id = :val')
            ->setParameter('val', $demandeId)
            ->getQuery()
            ->getResult();
    }
}
