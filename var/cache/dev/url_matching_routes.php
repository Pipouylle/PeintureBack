<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/RecapSemaine' => [[['_route' => 'RecapSemaine', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Affaires', '_api_operation_name' => 'RecapSemaine'], null, ['GET' => 0], null, false, false, null]],
        '/api/articlesArticleCouches' => [[['_route' => 'articles articleCouches', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => 'articles articleCouches'], null, ['GET' => 0], null, false, false, null]],
        '/api/commandesAffaires' => [[['_route' => 'CommandesCategories', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Commandes', '_api_operation_name' => 'CommandesCategories'], null, ['GET' => 0], null, false, false, null]],
        '/api/demandesCalendar' => [[['_route' => 'DemandesOf', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Demandes', '_api_operation_name' => 'DemandesOf'], null, ['GET' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api(?'
                    .'|/(?'
                        .'|\\.well\\-known/genid/([^/]++)(*:46)'
                        .'|errors/(\\d+)(*:65)'
                        .'|validation_errors/([^/]++)(*:98)'
                    .')'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:134)'
                    .'|/(?'
                        .'|d(?'
                            .'|ocs(?:\\.([^/]++))?(*:168)'
                            .'|emandes(?'
                                .'|(?:\\.([^/]++))?(*:201)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:235)'
                                .'|(?:\\.([^/]++))?(*:258)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:292)'
                            .')'
                        .')'
                        .'|co(?'
                            .'|n(?'
                                .'|texts/([^.]+)(?:\\.(jsonld))?(*:339)'
                                .'|sommations(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:386)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:412)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:450)'
                                    .')'
                                    .'|Semaine/([^/]++)(*:475)'
                                .')'
                            .')'
                            .'|mmandes(?'
                                .'|(?:\\.([^/]++))?(*:510)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:544)'
                                .'|(?:\\.([^/]++))?(*:567)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:601)'
                            .')'
                            .'|uches(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:644)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:670)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:708)'
                                .')'
                            .')'
                        .')'
                        .'|validation_errors/([^/]++)(?'
                            .'|(*:748)'
                        .')'
                        .'|a(?'
                            .'|ffaires(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:797)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:823)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:861)'
                                .')'
                            .')'
                            .'|rticle(?'
                                .'|_couches(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:917)'
                                    .'|(?:\\.([^/]++))?(*:940)'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:974)'
                                    .'|(?:\\.([^/]++))?(*:997)'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1031)'
                                .')'
                                .'|s(?'
                                    .'|ArticleCouche/([^/]++)(?'
                                        .'|(*:1070)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1106)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:1133)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:1172)'
                                    .')'
                                .')'
                                .'|Couche(?'
                                    .'|Demande/([^/]++)(*:1208)'
                                    .'|/([^/]++)(*:1226)'
                                .')'
                            .')'
                        .')'
                        .'|grenaillages(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1279)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1306)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1345)'
                            .')'
                        .')'
                        .'|jours(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1390)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1417)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1456)'
                            .')'
                        .')'
                        .'|o_fs(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1500)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1527)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1566)'
                            .')'
                        .')'
                        .'|s(?'
                            .'|emaines(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1617)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1644)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1683)'
                                .')'
                            .')'
                            .'|urface_couches(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1737)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1764)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1803)'
                                .')'
                            .')'
                            .'|ystemes(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1850)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1877)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1916)'
                                .')'
                            .')'
                        .')'
                    .')'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:1958)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        46 => [[['_route' => 'api_genid', '_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        65 => [[['_route' => 'api_errors', '_controller' => 'api_platform.action.error_page'], ['status'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        98 => [[['_route' => 'api_validation_errors', '_controller' => 'api_platform.action.not_exposed'], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        134 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        168 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        201 => [[['_route' => '_api_/demandes{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Demandes', '_api_operation_name' => '_api_/demandes{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        235 => [[['_route' => '_api_/demandes/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Demandes', '_api_operation_name' => '_api_/demandes/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        258 => [[['_route' => '_api_/demandes{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Demandes', '_api_operation_name' => '_api_/demandes{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        292 => [[['_route' => '_api_/demandes/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Demandes', '_api_operation_name' => '_api_/demandes/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null]],
        339 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        386 => [[['_route' => '_api_/consommations/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Consommations', '_api_operation_name' => '_api_/consommations/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        412 => [
            [['_route' => '_api_/consommations{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Consommations', '_api_operation_name' => '_api_/consommations{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/consommations{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Consommations', '_api_operation_name' => '_api_/consommations{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        450 => [
            [['_route' => '_api_/consommations/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Consommations', '_api_operation_name' => '_api_/consommations/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/consommations/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Consommations', '_api_operation_name' => '_api_/consommations/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        475 => [[['_route' => 'ConsommationsSemaine', '_controller' => 'App\\Controller\\ConsommationSemaineController', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Consommations', '_api_operation_name' => 'ConsommationsSemaine'], ['SemaineId'], ['GET' => 0], null, false, true, null]],
        510 => [[['_route' => '_api_/commandes{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Commandes', '_api_operation_name' => '_api_/commandes{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        544 => [[['_route' => '_api_/commandes/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Commandes', '_api_operation_name' => '_api_/commandes/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        567 => [[['_route' => '_api_/commandes{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Commandes', '_api_operation_name' => '_api_/commandes{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        601 => [[['_route' => '_api_/commandes/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Commandes', '_api_operation_name' => '_api_/commandes/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null]],
        644 => [[['_route' => '_api_/couches/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Couches', '_api_operation_name' => '_api_/couches/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        670 => [
            [['_route' => '_api_/couches{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Couches', '_api_operation_name' => '_api_/couches{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/couches{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Couches', '_api_operation_name' => '_api_/couches{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        708 => [
            [['_route' => '_api_/couches/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Couches', '_api_operation_name' => '_api_/couches/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/couches/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Couches', '_api_operation_name' => '_api_/couches/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        748 => [
            [['_route' => '_api_validation_errors_problem', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_problem'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_hydra', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_hydra'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_jsonapi', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_jsonapi'], ['id'], ['GET' => 0], null, false, true, null],
        ],
        797 => [[['_route' => '_api_/affaires/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Affaires', '_api_operation_name' => '_api_/affaires/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        823 => [
            [['_route' => '_api_/affaires{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Affaires', '_api_operation_name' => '_api_/affaires{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/affaires{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Affaires', '_api_operation_name' => '_api_/affaires{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        861 => [
            [['_route' => '_api_/affaires/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Affaires', '_api_operation_name' => '_api_/affaires/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => '_api_/affaires/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Affaires', '_api_operation_name' => '_api_/affaires/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/affaires/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Affaires', '_api_operation_name' => '_api_/affaires/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        917 => [[['_route' => '_api_/article_couches/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => '_api_/article_couches/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        940 => [[['_route' => '_api_/article_couches{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => '_api_/article_couches{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        974 => [[['_route' => '_api_/article_couches/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => '_api_/article_couches/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null]],
        997 => [[['_route' => '_api_/article_couches{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => '_api_/article_couches{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        1031 => [[['_route' => '_api_/article_couches/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => '_api_/article_couches/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null]],
        1070 => [
            [['_route' => 'articles articleCouche', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => 'articles articleCouche'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'update articles articleCouche', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => 'update articles articleCouche'], ['id'], ['PATCH' => 0], null, false, true, null],
        ],
        1106 => [[['_route' => '_api_/articles/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Articles', '_api_operation_name' => '_api_/articles/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1133 => [
            [['_route' => '_api_/articles{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Articles', '_api_operation_name' => '_api_/articles{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/articles{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Articles', '_api_operation_name' => '_api_/articles{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1172 => [
            [['_route' => '_api_/articles/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Articles', '_api_operation_name' => '_api_/articles/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => '_api_/articles/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Articles', '_api_operation_name' => '_api_/articles/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        1208 => [[['_route' => 'articleCoucheDemande', '_controller' => 'App\\Controller\\ArticleCoucheDemandeController', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => 'articleCoucheDemande'], ['CommandeId'], ['GET' => 0], null, false, true, null]],
        1226 => [[['_route' => 'articleCoucheByDemande', '_controller' => 'App\\Controller\\ArticleCoucheByDemandeController', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Articles', '_api_operation_name' => 'articleCoucheByDemande'], ['demandeId'], ['GET' => 0], null, false, true, null]],
        1279 => [[['_route' => '_api_/grenaillages/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Grenaillage', '_api_operation_name' => '_api_/grenaillages/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1306 => [
            [['_route' => '_api_/grenaillages{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Grenaillage', '_api_operation_name' => '_api_/grenaillages{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/grenaillages{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Grenaillage', '_api_operation_name' => '_api_/grenaillages{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1345 => [
            [['_route' => '_api_/grenaillages/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Grenaillage', '_api_operation_name' => '_api_/grenaillages/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/grenaillages/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Grenaillage', '_api_operation_name' => '_api_/grenaillages/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1390 => [[['_route' => '_api_/jours/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Jours', '_api_operation_name' => '_api_/jours/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1417 => [
            [['_route' => '_api_/jours{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Jours', '_api_operation_name' => '_api_/jours{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/jours{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Jours', '_api_operation_name' => '_api_/jours{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1456 => [
            [['_route' => '_api_/jours/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Jours', '_api_operation_name' => '_api_/jours/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/jours/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Jours', '_api_operation_name' => '_api_/jours/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1500 => [[['_route' => '_api_/o_fs/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\OFs', '_api_operation_name' => '_api_/o_fs/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1527 => [
            [['_route' => '_api_/o_fs{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\OFs', '_api_operation_name' => '_api_/o_fs{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/o_fs{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\OFs', '_api_operation_name' => '_api_/o_fs{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1566 => [
            [['_route' => '_api_/o_fs/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\OFs', '_api_operation_name' => '_api_/o_fs/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/o_fs/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\OFs', '_api_operation_name' => '_api_/o_fs/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1617 => [[['_route' => '_api_/semaines/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Semaines', '_api_operation_name' => '_api_/semaines/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1644 => [
            [['_route' => '_api_/semaines{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Semaines', '_api_operation_name' => '_api_/semaines{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/semaines{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Semaines', '_api_operation_name' => '_api_/semaines{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1683 => [
            [['_route' => '_api_/semaines/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Semaines', '_api_operation_name' => '_api_/semaines/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/semaines/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Semaines', '_api_operation_name' => '_api_/semaines/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1737 => [[['_route' => '_api_/surface_couches/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SurfaceCouches', '_api_operation_name' => '_api_/surface_couches/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1764 => [
            [['_route' => '_api_/surface_couches{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SurfaceCouches', '_api_operation_name' => '_api_/surface_couches{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/surface_couches{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SurfaceCouches', '_api_operation_name' => '_api_/surface_couches{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1803 => [
            [['_route' => '_api_/surface_couches/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SurfaceCouches', '_api_operation_name' => '_api_/surface_couches/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/surface_couches/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SurfaceCouches', '_api_operation_name' => '_api_/surface_couches/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1850 => [[['_route' => '_api_/systemes/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Systemes', '_api_operation_name' => '_api_/systemes/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1877 => [
            [['_route' => '_api_/systemes{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Systemes', '_api_operation_name' => '_api_/systemes{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
            [['_route' => '_api_/systemes{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Systemes', '_api_operation_name' => '_api_/systemes{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
        ],
        1916 => [
            [['_route' => '_api_/systemes/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Systemes', '_api_operation_name' => '_api_/systemes/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/systemes/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Systemes', '_api_operation_name' => '_api_/systemes/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1958 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
