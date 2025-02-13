<?php

namespace ContainerSKILRsg;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getAnnotatedAppEntityCouchesApiPlatformDoctrineOrmFilterSearchFilterService extends App_KernelProdContainer
{
    /*
     * Gets the private 'annotated_app_entity_couches_api_platform_doctrine_orm_filter_search_filter' shared autowired service.
     *
     * @return \ApiPlatform\Doctrine\Orm\Filter\SearchFilter
     */
    public static function do($container, $lazyLoad = true)
    {
        $a = ($container->privates['api_platform.symfony.iri_converter'] ?? self::getApiPlatform_Symfony_IriConverterService($container));

        if (isset($container->privates['annotated_app_entity_couches_api_platform_doctrine_orm_filter_search_filter'])) {
            return $container->privates['annotated_app_entity_couches_api_platform_doctrine_orm_filter_search_filter'];
        }
        $b = ($container->privates['api_platform.api.identifiers_extractor'] ?? self::getApiPlatform_Api_IdentifiersExtractorService($container));

        if (isset($container->privates['annotated_app_entity_couches_api_platform_doctrine_orm_filter_search_filter'])) {
            return $container->privates['annotated_app_entity_couches_api_platform_doctrine_orm_filter_search_filter'];
        }

        return $container->privates['annotated_app_entity_couches_api_platform_doctrine_orm_filter_search_filter'] = new \ApiPlatform\Doctrine\Orm\Filter\SearchFilter(($container->services['doctrine'] ?? self::getDoctrineService($container)), $a, ($container->privates['property_accessor'] ?? self::getPropertyAccessorService($container)), ($container->privates['logger'] ?? self::getLoggerService($container)), ['systeme_couche' => 'exact'], $b, ($container->privates['api_platform.hydra.name_converter.hydra_prefix'] ?? self::getApiPlatform_Hydra_NameConverter_HydraPrefixService($container)));
    }
}
