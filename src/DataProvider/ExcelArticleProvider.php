<?php

namespace App\DataProvider;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\DTOs\ExcelArticleOutput;
use App\Entity\Articles;
use Doctrine\ORM\EntityManagerInterface;

class ExcelArticleProvider implements ProviderInterface
{
    public function __construct(
        private EntityManagerInterface $em,
    ){}


    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $articles = $this->em->getRepository(Articles::class)->findAll();

        $dtos = [];

        foreach ($articles as $article) {
            $dto = new ExcelArticleOutput();
            $dto->nomFournisseur = $article->getFournisseurArticle()->getNomFournisseur();
            $dto->code = $article->getId();
            $dto->designation = $article->getDesignationArticle();
            $dto->ral = $article->getRalArticle();

            $dtos[] = $dto;
        }

        return $dtos;
    }
}