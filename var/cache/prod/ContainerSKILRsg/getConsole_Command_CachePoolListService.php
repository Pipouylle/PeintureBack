<?php

namespace ContainerSKILRsg;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getConsole_Command_CachePoolListService extends App_KernelProdContainer
{
    /*
     * Gets the private 'console.command.cache_pool_list' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\CachePoolListCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->privates['console.command.cache_pool_list'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\CachePoolListCommand(['cache.app', 'cache.system', 'cache.validator', 'cache.serializer', 'cache.property_info', 'doctrine.result_cache_pool', 'doctrine.system_cache_pool', 'cache.property_access', 'cache.validator_expression_language', 'cache.security_expression_language', 'cache.security_is_granted_attribute_expression_language', 'cache.security_is_csrf_token_valid_attribute_expression_language', 'api_platform.cache.route_name_resolver', 'api_platform.cache.metadata.resource', 'api_platform.cache.metadata.property', 'api_platform.cache.metadata.resource_collection', 'api_platform.cache.openapi']);

        $instance->setName('cache:pool:list');
        $instance->setDescription('List available cache pools');

        return $instance;
    }
}
