<?php

namespace App\Filter;

use ApiPlatform\Doctrine\Orm\Filter\AbstractFilter;
use ApiPlatform\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use ApiPlatform\Metadata\Operation;
use Doctrine\ORM\QueryBuilder;

class SemaineFilter extends AbstractFilter
{

    protected function filterProperty(string $property, $value, QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, ?Operation $operation = null, array $context = []): void
    {
        if ($property === 'semaine') {
            $alias = $queryBuilder->getRootAliases()[0];
            $queryBuilder
                ->join(sprintf('%s.of_consommation', $alias), 'o')
                ->join('o.semaine_of', 's')
                ->andWhere('s.id = :semaineId')
                ->setParameter('semaineId', $value);
        }
    }

    public function getDescription(string $resourceClass): array
    {
        return [
            'semaine' => [
                'property' => 'semaine',
                'type' => 'string',
                'required' => false,
                'openapi' => [
                    'description' => 'Filtrer par ID de semaine'
                ]
            ]
        ];
    }


}