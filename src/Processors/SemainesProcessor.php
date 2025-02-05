<?php

namespace App\Processors;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\DTOs\SemainesInput;
use App\Entity\Semaines;
use Doctrine\ORM\EntityManagerInterface;

class SemainesProcessor implements ProcessorInterface
{
    public function __construct(
        private readonly ProcessorInterface $persistProcessor
    )
    {
    }


    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        if ($data instanceof SemainesInput) {
            $Semaines = new Semaines();

            $dateDebut = \DateTime::createFromFormat('Y-m-d', $data->dateDebut_semaine);
            if (!$dateDebut) {
                throw new \InvalidArgumentException('Format de date invalide. Utilisez Y-m-d.');
            }

            $Semaines->setAnnees($data->annees);
            $Semaines->setMois($data->mois);
            $Semaines->setSemaine($data->semaine);
            $Semaines->setDateDebutSemaine($dateDebut);

            return $this->persistProcessor->process($Semaines, $operation, $uriVariables, $context);
        }
        return $this->persistProcessor->process($data, $operation, $uriVariables, $context);
    }
}