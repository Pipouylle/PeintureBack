<?php

namespace ContainerSKILRsg;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDemandesRepositoryService extends App_KernelProdContainer
{
    /*
     * Gets the private 'App\Repository\DemandesRepository' shared autowired service.
     *
     * @return \App\Repository\DemandesRepository
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['App\\Repository\\DemandesRepository'] = new \App\Repository\DemandesRepository(($container->services['doctrine'] ?? self::getDoctrineService($container)));
    }
}
