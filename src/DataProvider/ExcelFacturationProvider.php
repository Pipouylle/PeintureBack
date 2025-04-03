<?php

namespace App\DataProvider;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\DTOs\ExcelFacturationOutput;
use App\Entity\Semaines;
use Doctrine\ORM\EntityManagerInterface;
use function Webmozart\Assert\Tests\StaticAnalysis\float;

class ExcelFacturationProvider implements ProviderInterface
{
    public function __construct(
        private EntityManagerInterface $em,
    )
    {
    }


    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $semaines = $this->em->getRepository(Semaines::class)->findAll();
        foreach ($semaines as $semaine) {
            $annee = $semaine->getAnnees();
            $mois = $semaine->getMois();
            $cle = "$annee-$mois";

            if (!isset($semainesParMois[$cle])) {
                $semainesParMois[$cle] = [
                    'annee' => $annee,
                    'mois' => $mois,
                    'semaines' => []
                ];
            }

            $semainesParMois[$cle]['semaines'][] = $semaine;
        }

        $dtos = [];

        // Pour chaque mois, créer des facturations basées sur les avancements
        foreach ($semainesParMois as $moisData) {
            $annee = $moisData['annee'];
            $mois = $moisData['mois'];
            $semainesDuMois = $moisData['semaines'];

            // Récupérer les commandes avec avancement pour ce mois
            $commandes = [];

            foreach ($semainesDuMois as $semaine) {
                $ofs = $semaine->getOfsSemaine();
                foreach ($ofs as $of) {
                    $exist = false;
                    $commandeTest = $of->getIdDemandeOf()->getCommandeDemande();
                    foreach ($commandes as $commande) {
                        if ($commande->getId() === $commandeTest->getId()) {
                            $exist = true;
                            break;
                        }
                    }
                    if (!$exist) {
                        $commandes[] = $commandeTest;
                    }
                }
            }

            foreach ($commandes as $commande) {
                $dto = new ExcelFacturationOutput();
                $dto->annee = $annee;
                $dto->mois = $mois;
                $dto->chantier = $commande->getAffaireCommande()->getNomAffaire() . ' - ' . $commande->getAffaireCommande()->getNumeroAffaire();
                $dto->commandeEureka = $commande->getEurekaCommande();
                $dto->systeme = $commande->getSystemeCommande()->getNomSysteme() . ' - ' . $commande->getRalCommande();

                $demandes = $commande->getDemandes();
                $nbCouche = $commande->getSystemeCommande()->getCouches()->count();
                $avancementGreCommande = 0;
                $avancementCoucheCommande = [0, 0, 0, 0];
                $regieSFPCommande = 0;
                $regieFPCommande = 0;
                foreach ($demandes as $demande) {
                    $avancementGreDemande = 0;
                    $avancementCoucheDemande = [0, 0, 0, 0];
                    $ofs = $demande->getOfs()->filter(fn($of) => in_array($of->getSemaineOf()->getId(), array_map(fn($semaine) => $semaine->getId(), $semainesDuMois)));
                    foreach ($ofs as $of) {
                        $avancementGreDemande += $of->getAvancementOf();
                        $regieSFPCommande += $of->getRegieSFPOf();
                        $regieFPCommande += $of->getRegieFPOf();
                        $nbCoucheTest = $of->getAvancementSurfaceCouchesOf()->count();
                        for ($i = 0; $i < $nbCoucheTest; $i++) {
                            $avancementCoucheDemande[$i] += $of->getAvancementSurfaceCouchesOf()[$i]->getAvancementAvancement();
                        }
                    }
                    $avancementGreCommande += (($avancementGreDemande * $demande->getSurfaceDemande()) /100);
                    for ($i = 0; $i < $nbCouche; $i++) {
                        $avancementCoucheCommande[$i] += (($avancementCoucheDemande[$i] * $demande->getSurfaceDemande()) / 100);
                    }
                }

                // Facturation principale
                $dto->libGre = '';
                $dto->vaUnitGre = 0;
                $dto->qteGre = 0;
                $dto->vaTotalGre = 0;

                // Initialiser les autres champs
                $dto->libC1 = '';
                $dto->vaUnitC1 = 0;
                $dto->qteC1 = 0;
                $dto->vaTotalC1 = 0;

                $dto->libC2 = '';
                $dto->vaUnitC2 = 0;
                $dto->qteC2 = 0;
                $dto->vaTotalC2 = 0;

                $dto->libC3 = '';
                $dto->vaUnitC3 = 0;
                $dto->qteC3 = 0;
                $dto->vaTotalC3 = 0;

                $dto->libC4 = '';
                $dto->vaUnitC4 = 0;
                $dto->qteC4 = 0;
                $dto->vaTotalC4 = 0;

                $dto->libRegieSFP = 'régie SFP';
                $dto->vaUnitRegieSFP = floatval($commande->getRegieSFPCommande());
                $dto->qteRegieSFP = $regieSFPCommande;
                $dto->vaTotalRegieSFP = $regieSFPCommande * $dto->vaUnitRegieSFP;

                $dto->libRegieFP = 'régie FP';
                $dto->vaUnitRegieFP = floatval($commande->getRegieFPCommande());
                $dto->qteRegieFP = $regieFPCommande;
                $dto->vaTotalRegieFP = $regieFPCommande * $dto->vaUnitRegieFP;

                if($commande->getSystemeCommande()->getGrenaillageSysteme() !== null){
                    $dto->libGre = 'grenaillage';
                    $dto->vaUnitGre = floatval($commande->getGrenaillageCommande());
                    $dto->qteGre = $avancementGreCommande;
                    $dto->vaTotalGre = $avancementGreCommande * $dto->vaUnitGre;
                }
                if ($nbCouche > 0) {
                    $dto->libC1 = '1ere couche';
                    $dto->vaUnitC1 = floatval($commande->getCouches()[0]->getTarifArticleCouche());
                    $dto->qteC1 = $avancementCoucheCommande[0];
                    $dto->vaTotalC1 = $avancementCoucheCommande[0] * $dto->vaUnitC1;
                }
                if ($nbCouche > 1) {
                    $dto->libC2 = '2eme couche';
                    $dto->vaUnitC2 = floatval($commande->getCouches()[1]->getTarifArticleCouche());
                    $dto->qteC2 = $avancementCoucheCommande[1];
                    $dto->vaTotalC2 = $avancementCoucheCommande[1] * $dto->vaUnitC2;
                }
                if ($nbCouche > 2) {
                    $dto->libC3 = '3eme couche';
                    $dto->vaUnitC3 = floatval($commande->getCouches()[2]->getTarifArticleCouche());
                    $dto->qteC3 = $avancementCoucheCommande[2];
                    $dto->vaTotalC3 = $avancementCoucheCommande[2] * $dto->vaUnitC3;
                }
                if ($nbCouche > 3) {
                    $dto->libC4 = '4eme couche';
                    $dto->vaUnitC4 = floatval($commande->getCouches()[3]->getTarifArticleCouche());
                    $dto->qteC4 = $avancementCoucheCommande[3];
                    $dto->vaTotalC4 = $avancementCoucheCommande[3] * $dto->vaUnitC4;
                }

                $dtos[] = $dto;
            }
        }

        return $dtos;
    }
}