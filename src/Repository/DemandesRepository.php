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
            ->join('d.commande_demande', 'c')
            ->join('c.affaire_commande', 'a')
            ->join('c.systeme_commande', 's')
            ->getQuery()
            ->getArrayResult();
    }

    public function getPreviousAvancement(int $idDemande, int $jourId, int $semaineId): array
    {
        return $this->createQueryBuilder('d')
            ->select('d.id as demandeId','SUM(o.avancement_of) as avancement')
            ->join('d.Of_demande', 'o')
            ->where('d.id = :idDemande')
            ->andWhere('o.semaine_of < :semaineId OR (o.semaine_of = :semaineId AND o.jour_of < :jourId)')
            ->setParameter('idDemande', $idDemande)
            ->setParameter('semaineId', $semaineId)
            ->setParameter('jourId', $jourId)
            ->groupBy('d.id')
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getAllDemandesNotFinish(): array
    {
        return $this->createQueryBuilder('d')
            ->select('d')
            ->where('d.etat_demande != :etat')
            ->setParameter('etat', 'terminé')
            ->getQuery()
            ->getResult();
    }

}
