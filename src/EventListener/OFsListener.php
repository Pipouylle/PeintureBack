<?php

namespace App\EventListener;
use App\Entity\OFs;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreRemoveEventArgs;
use Doctrine\ORM\Exception\ORMException;

class OFsListener
{
    public function preRemove(PreRemoveEventArgs $event): void
    {
        $entity = $event->getObject();

        if (!$entity instanceof OFs) {
            return;
        }

        if ($entity->getAvancementOf() > 0) {
            throw new \Exception('Impossible de supprimer un OF dont l\'avancement est supérieur à 0. ofIf = ' , $entity->getAvancementOf());
        }
    }
}