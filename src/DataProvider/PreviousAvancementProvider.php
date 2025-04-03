<?php

namespace App\DataProvider;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\DTOs\PreviousAvancementOutput;
use App\Entity\Demandes;
use App\Entity\OFs;
use Doctrine\ORM\EntityManagerInterface;

class PreviousAvancementProvider implements ProviderInterface
{
    public function __construct(
        private EntityManagerInterface $em,
    )
    {
    }


    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $idDemande = $uriVariables['demandeId'] ?? null;
        $idOf = $uriVariables['ofId'] ?? null;

        if ($idDemande === null) {
            throw new \InvalidArgumentException('L\'ID de la demande est requis.');
        }

        if ($idOf === null) {
            throw new \InvalidArgumentException('L\'ID de l\'OF est requis.');
        }

        $demande = $this->em->getRepository(Demandes::class)->find($idDemande);
        $ofParam = $this->em->getRepository(OFs::class)->find($idOf);

        $ofs = $demande->getOfs();
        $nbCouches = $ofParam->getAvancementSurfaceCouchesOf()->count();
        $avancement = 0;
        $avancements= [0,0,0,0];

        foreach ($ofs as $of) {
            if ($of->getId() !== $idOf) {
                $nbCouchesOf= $of->getAvancementSurfaceCouchesOf()->count();
                if ($of->getSemaineof()->getId() < $ofParam->getSemaineof()->getId()) {
                    $avancement += $of->getAvancementOf();
                    for ($i = 0; $i < $nbCouchesOf; $i++) {
                        $avancements[$i] += $of->getAvancementSurfaceCouchesOf()[$i]->getAvancementAvancement();
                    }
                } elseif ($of->getSemaineof()->getId() === $ofParam->getSemaineof()->getId() && $of->getJourOf()->getId() < $ofParam->getJourOf()->getId()) {
                    $avancement += $of->getAvancementOf();
                    for ($i = 0; $i < $nbCouchesOf; $i++) {
                        $avancements[$i] += $of->getAvancementSurfaceCouchesOf()[$i]->getAvancementAvancement();
                    }
                }
            }
        }

        $dto = new PreviousAvancementOutput();
        $dto->demandeId = $idDemande;
        $dto->avancement = $avancement;
        $dto->avancementC1 = $avancements[0];
        $dto->avancementC2 = $avancements[1];
        $dto->avancementC3 = $avancements[2];
        $dto->avancementC4 = $avancements[3];

        return $dto;
    }
}