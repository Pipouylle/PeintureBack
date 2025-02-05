<?php

namespace App\Processors;


use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\OFs;
use App\dtos\OFsInput as OFsInputDTO;
use App\Entity\Demandes;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OFsProcessor implements ProcessorInterface
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly ProcessorInterface     $persistProcessor
    )
    {
    }

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        if ($data instanceof OFsInputDTO) {
            $ofs = new OFs();

            $dateOf = \DateTime::createFromFormat('Y-m-d', $data->date_of);
            if (!$dateOf) {
                throw new \InvalidArgumentException('Format de date invalide. Utilisez Y-m-d.');
            }
            $explode = explode('/', $data->idDemande_of);
            $demandeId = (int) array_pop($explode);
            $demande = $this->entityManager->getRepository(Demandes::class)->find($demandeId); 
            if (!$demande) {
                throw new NotFoundHttpException('Demande non trouvée.');
            }

            $ofs->setCabineOf($data->cabine_of);
            $ofs->setDateOf($dateOf);
            $ofs->setAvancementOf($data->avancement_of);
            $ofs->setIdDemandeOf($demande);

            return $this->persistProcessor->process($ofs, $operation, $uriVariables, $context);
        }

        return $this->persistProcessor->process($data, $operation, $uriVariables, $context);
    }
}