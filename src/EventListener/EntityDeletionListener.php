<?php

namespace App\EventListener;
use App\Entity\Affaires;
use App\Entity\Commandes;
use App\Entity\Demandes;
use App\Entity\Systemes;
use App\Entity\OFs;
use Doctrine\ORM\Event\PreRemoveEventArgs;
use Doctrine\ORM\Exception\ORMException;

class EntityDeletionListener
{
    public function preRemove(PreRemoveEventArgs $event): void
    {
        $entity = $event->getObject();

        if ($entity instanceof Affaires) {
            $this->checkCommandes($entity->getCommandes());
        } elseif ($entity instanceof Commandes) {
            $this->checkDemandes($entity->getDemandes());
        } elseif ($entity instanceof Demandes) {
            $this->checkOfs($entity->getOfs());
        } elseif ($entity instanceof Systemes) {
            $this->checkCommandes($entity->getCommandes());
        }
    }

    private function checkCommandes(iterable $commandes): void
    {
        foreach ($commandes as $commande) {
            if ($commande instanceof Commandes) {
                $this->checkDemandes($commande->getDemandes());
            }
        }
    }

    private function checkDemandes(iterable $demandes): void
    {
        foreach ($demandes as $demande) {
            if ($demande Instanceof Demandes) {
                $this->checkOfs($demande->getOfs());
            }
        }
    }

    private function checkOfs(iterable $ofs): void
    {
        foreach ($ofs as $of) {
            if ($of instanceof OFs && $of->getAvancementOf() > 0) {
                throw new \RuntimeException("Impossible de supprimer : un OF a un avancement > 0.");
            }
        }
    }
}