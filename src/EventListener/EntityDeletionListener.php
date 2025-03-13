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
        $entityManager = $event->getObjectManager();

        if ($entity instanceof Affaires) {
            $this->checkRelatedEntities($entity, ['commandes'], $entityManager);
        } elseif ($entity instanceof Commandes) {
            $this->checkRelatedEntities($entity, ['demandes'], $entityManager);
        } elseif ($entity instanceof Demandes) {
            $this->checkRelatedEntities($entity, ['ofs'], $entityManager);
        } elseif ($entity instanceof Systemes) {
            $this->checkRelatedEntities($entity, ['ofs'], $entityManager);
        }
    }

    private function checkRelatedEntities($entity, array $relations, $entityManager): void
    {
        foreach ($relations as $relation) {
            $relatedEntities = $entity->{'get' . ucfirst($relation)}();

            foreach ($relatedEntities as $relatedEntity) {
                if ($relatedEntity instanceof OFs && $relatedEntity->getAvancementOf() > 0) {
                    throw new \Exception("Impossible de supprimer cette entité car un OF lié a un avancement supérieur à 0.");
                }

                // Vérification récursive pour les entités intermédiaires
                if (!($relatedEntity instanceof OFs)) {
                    $this->checkRelatedEntities($relatedEntity, ['ofs'], $entityManager);
                }
            }
        }
    }
}