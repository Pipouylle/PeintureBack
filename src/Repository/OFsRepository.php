<?php

namespace App\Repository;

use App\Entity\OFs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OFs>
 */
class OFsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OFs::class);
    }

//    /**
//     * @return OFs[] Returns an array of OFs objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OFs
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
    public function findBeforSixMonth(): array
    {
        $date = new \DateTime();
        $date->modify("-7 months");

        return $this->createQueryBuilder('ofs')
            ->select('ofs')
            ->join('ofs.semaine_of', 'semaine')
            ->where('semaine.dateDebut_semaine >= :date')
            ->setParameter('date', $date)
            ->getQuery()
            ->getResult();
    }

}
