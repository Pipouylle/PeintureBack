<?php

namespace ContainerSKILRsg;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getArticleCoucheRepositoryService extends App_KernelProdContainer
{
    /*
     * Gets the private 'App\Repository\ArticleCoucheRepository' shared autowired service.
     *
     * @return \App\Repository\ArticleCoucheRepository
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['App\\Repository\\ArticleCoucheRepository'] = new \App\Repository\ArticleCoucheRepository(($container->services['doctrine'] ?? self::getDoctrineService($container)));
    }
}
