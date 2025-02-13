<?php

namespace ContainerSKILRsg;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_Serializer_FilterParameterProviderService extends App_KernelProdContainer
{
    /*
     * Gets the private 'api_platform.serializer.filter_parameter_provider' shared service.
     *
     * @return \ApiPlatform\Serializer\Parameter\SerializerFilterParameterProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['api_platform.serializer.filter_parameter_provider'] = new \ApiPlatform\Serializer\Parameter\SerializerFilterParameterProvider(($container->privates['api_platform.filter_locator'] ?? self::getApiPlatform_FilterLocatorService($container)));
    }
}
