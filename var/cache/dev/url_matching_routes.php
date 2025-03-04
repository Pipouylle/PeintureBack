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
                            .'|emande(?'
                                .'|s(?'
                                    .'|(?:\\.([^/]++))?(*:204)'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:238)'
                                    .'|(?:\\.([^/]++))?(*:261)'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:298)'
                                    .')'
                                .')'
                                .'|Etat/([^/]++)(*:321)'
                            .')'
                        .')'
                        .'|co(?'
                            .'|ntexts/([^.]+)(?:\\.(jsonld))?(*:365)'
                            .'|mmandes(?'
                                .'|(?:\\.([^/]++))?(*:398)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:432)'
                                .'|(?:\\.([^/]++))?(*:455)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:492)'
                                .')'
                            .')'
                            .'|uches(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:536)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:562)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:600)'
                                .')'
                            .')'
                        .')'
                        .'|validation_errors/([^/]++)(?'
                            .'|(*:640)'
                        .')'
                        .'|a(?'
                            .'|ffaires(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:689)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:715)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:753)'
                                .')'
                            .')'
                            .'|rticle(?'
                                .'|_couches(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:809)'
                                    .'|(?:\\.([^/]++))?(*:832)'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:866)'
                                    .'|(?:\\.([^/]++))?(*:889)'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:923)'
                                .')'
                                .'|s(?'
                                    .'|ArticleCouche/([^/]++)(?'
                                        .'|(*:961)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:996)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:1022)'
                                    .')'
                                    .'|/(?'
                                        .'|([^/\\.]++)(?:\\.([^/]++))?(*:1061)'
                                        .'|([^/]++)(*:1078)'
                                    .')'
                                .')'
                                .'|Couche(?'
                                    .'|Demande/([^/]++)(*:1114)'
                                    .'|BySystemeAndCommande/([^/]++)/([^/]++)(*:1161)'
                                    .'|/([^/]++)(*:1179)'
                                .')'
                            .')'
                            .'|vancement_surface_couches(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1244)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1271)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1310)'
                                .')'
                            .')'
                            .'|llAvancement(?'
                                .'|Semaine/([^/]++)(*:1352)'
                                .'|Demande/([^/]++)(*:1377)'
                            .')'
                        .')'
                        .'|modifAvancement/([^/]++)(*:1412)'
                        .'|fournisseurs(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1462)'
                            .'|(?:\\.([^/]++))?(*:1486)'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1521)'
                            .'|(?:\\.([^/]++))?(*:1545)'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1580)'
                        .')'
                        .'|grenaillages(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1631)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1658)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1697)'
                            .')'
                        .')'
                        .'|jours(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1742)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1769)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1808)'
                            .')'
                        .')'
                        .'|o(?'
                            .'|_fs(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1855)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1882)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1921)'
                                .')'
                            .')'
                            .'|fs(?'
                                .'|Order/([^/]++)(*:1951)'
                                .'|Regie/([^/]++)(*:1974)'
                            .')'
                        .')'
                        .'|s(?'
                            .'|emaines(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:2025)'
                                .'|(?:\\.([^/]++))?(*:2049)'
                                .'|/([^/]++)(*:2067)'
                            .')'
                            .'|tock(?'
                                .'|s(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:2114)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:2141)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:2180)'
                                    .')'
                                .')'
                                .'|Sortie/([^/]++)(*:2206)'
                                .'|Create/([^/]++)/([^/]++)(*:2239)'
                            .')'
                            .'|urface_couches(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:2292)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:2319)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:2358)'
                                .')'
                            .')'
                            .'|ystemes(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:2405)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:2432)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:2471)'
                                .')'
                            .')'
                        .')'
                        .'|users(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:2517)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:2544)'
                            .')'
                            .'|/([^/]++)(*:2563)'
                        .')'
                    .')'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:2603)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        46 => [[['_route' => 'api_genid', '_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        65 => [[['_route' => 'api_errors', '_controller' => 'api_platform.action.error_page'], ['status'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        98 => [[['_route' => 'api_validation_errors', '_controller' => 'api_platform.action.not_exposed'], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        134 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        168 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        204 => [[['_route' => '_api_/demandes{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Demandes', '_api_operation_name' => '_api_/demandes{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        238 => [[['_route' => '_api_/demandes/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Demandes', '_api_operation_name' => '_api_/demandes/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        261 => [[['_route' => '_api_/demandes{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Demandes', '_api_operation_name' => '_api_/demandes{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        298 => [
            [['_route' => '_api_/demandes/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Demandes', '_api_operation_name' => '_api_/demandes/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => '_api_/demandes/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Demandes', '_api_operation_name' => '_api_/demandes/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        321 => [[['_route' => 'patch demande etat', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Demandes', '_api_operation_name' => 'patch demande etat'], ['id'], ['PATCH' => 0], null, false, true, null]],
        365 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        398 => [[['_route' => '_api_/commandes{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Commandes', '_api_operation_name' => '_api_/commandes{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        432 => [[['_route' => '_api_/commandes/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Commandes', '_api_operation_name' => '_api_/commandes/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        455 => [[['_route' => '_api_/commandes{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Commandes', '_api_operation_name' => '_api_/commandes{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        492 => [
            [['_route' => '_api_/commandes/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Commandes', '_api_operation_name' => '_api_/commandes/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => '_api_/commandes/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Commandes', '_api_operation_name' => '_api_/commandes/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        536 => [[['_route' => '_api_/couches/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Couches', '_api_operation_name' => '_api_/couches/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        562 => [
            [['_route' => '_api_/couches{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Couches', '_api_operation_name' => '_api_/couches{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/couches{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Couches', '_api_operation_name' => '_api_/couches{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        600 => [
            [['_route' => '_api_/couches/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Couches', '_api_operation_name' => '_api_/couches/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/couches/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Couches', '_api_operation_name' => '_api_/couches/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => '_api_/couches/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Couches', '_api_operation_name' => '_api_/couches/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        640 => [
            [['_route' => '_api_validation_errors_problem', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_problem'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_hydra', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_hydra'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_jsonapi', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_jsonapi'], ['id'], ['GET' => 0], null, false, true, null],
        ],
        689 => [[['_route' => '_api_/affaires/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Affaires', '_api_operation_name' => '_api_/affaires/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        715 => [
            [['_route' => '_api_/affaires{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Affaires', '_api_operation_name' => '_api_/affaires{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/affaires{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Affaires', '_api_operation_name' => '_api_/affaires{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        753 => [
            [['_route' => '_api_/affaires/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Affaires', '_api_operation_name' => '_api_/affaires/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => '_api_/affaires/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Affaires', '_api_operation_name' => '_api_/affaires/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/affaires/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Affaires', '_api_operation_name' => '_api_/affaires/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        809 => [[['_route' => '_api_/article_couches/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => '_api_/article_couches/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        832 => [[['_route' => '_api_/article_couches{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => '_api_/article_couches{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        866 => [[['_route' => '_api_/article_couches/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => '_api_/article_couches/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null]],
        889 => [[['_route' => '_api_/article_couches{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => '_api_/article_couches{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        923 => [[['_route' => '_api_/article_couches/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => '_api_/article_couches/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null]],
        961 => [
            [['_route' => 'articles articleCouche', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => 'articles articleCouche'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'update articles articleCouche', '_controller' => 'App\\Controller\\PatchArticlesArticleCoucheController', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => 'update articles articleCouche'], ['id'], ['PATCH' => 0], null, false, true, null],
        ],
        996 => [[['_route' => '_api_/articles/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Articles', '_api_operation_name' => '_api_/articles/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1022 => [
            [['_route' => '_api_/articles{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Articles', '_api_operation_name' => '_api_/articles{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/articles{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Articles', '_api_operation_name' => '_api_/articles{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1061 => [[['_route' => '_api_/articles/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Articles', '_api_operation_name' => '_api_/articles/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null]],
        1078 => [[['_route' => 'update articleCouche', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Articles', '_api_operation_name' => 'update articleCouche'], ['id'], ['PATCH' => 0], null, false, true, null]],
        1114 => [[['_route' => 'articleCoucheDemande', '_controller' => 'App\\Controller\\ArticleCoucheByCommandeController', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => 'articleCoucheDemande'], ['CommandeId'], ['GET' => 0], null, false, true, null]],
        1161 => [[['_route' => 'get All article by systeme id', '_controller' => 'App\\Controller\\ArticleCoucheBySystemeController', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => 'get All article by systeme id'], ['systemeId', 'commandeId'], ['GET' => 0], null, false, true, null]],
        1179 => [[['_route' => 'articleCoucheByDemande', '_controller' => 'App\\Controller\\ArticleCoucheByDemandeController', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Articles', '_api_operation_name' => 'articleCoucheByDemande'], ['demandeId'], ['GET' => 0], null, false, true, null]],
        1244 => [[['_route' => '_api_/avancement_surface_couches/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AvancementSurfaceCouches', '_api_operation_name' => '_api_/avancement_surface_couches/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1271 => [
            [['_route' => '_api_/avancement_surface_couches{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AvancementSurfaceCouches', '_api_operation_name' => '_api_/avancement_surface_couches{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/avancement_surface_couches{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AvancementSurfaceCouches', '_api_operation_name' => '_api_/avancement_surface_couches{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1310 => [
            [['_route' => '_api_/avancement_surface_couches/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AvancementSurfaceCouches', '_api_operation_name' => '_api_/avancement_surface_couches/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/avancement_surface_couches/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AvancementSurfaceCouches', '_api_operation_name' => '_api_/avancement_surface_couches/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1352 => [[['_route' => 'all avancement surface couches by semaine', '_controller' => 'App\\Controller\\AllAvancementSemaineController', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AvancementSurfaceCouches', '_api_operation_name' => 'all avancement surface couches by semaine'], ['semaineId'], ['GET' => 0], null, false, true, null]],
        1377 => [[['_route' => 'all avancement surface couches by demande', '_controller' => 'App\\Controller\\AllAvancementDemandeController', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AvancementSurfaceCouches', '_api_operation_name' => 'all avancement surface couches by demande'], ['demandeId'], ['GET' => 0], null, false, true, null]],
        1412 => [[['_route' => 'update avancement surface couches', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AvancementSurfaceCouches', '_api_operation_name' => 'update avancement surface couches'], ['id'], ['PATCH' => 0], null, false, true, null]],
        1462 => [[['_route' => '_api_/fournisseurs/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Fournisseur', '_api_operation_name' => '_api_/fournisseurs/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1486 => [[['_route' => '_api_/fournisseurs{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Fournisseur', '_api_operation_name' => '_api_/fournisseurs{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        1521 => [[['_route' => '_api_/fournisseurs/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Fournisseur', '_api_operation_name' => '_api_/fournisseurs/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null]],
        1545 => [[['_route' => '_api_/fournisseurs{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Fournisseur', '_api_operation_name' => '_api_/fournisseurs{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        1580 => [[['_route' => '_api_/fournisseurs/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Fournisseur', '_api_operation_name' => '_api_/fournisseurs/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null]],
        1631 => [[['_route' => '_api_/grenaillages/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Grenaillage', '_api_operation_name' => '_api_/grenaillages/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1658 => [
            [['_route' => '_api_/grenaillages{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Grenaillage', '_api_operation_name' => '_api_/grenaillages{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/grenaillages{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Grenaillage', '_api_operation_name' => '_api_/grenaillages{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1697 => [
            [['_route' => '_api_/grenaillages/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Grenaillage', '_api_operation_name' => '_api_/grenaillages/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/grenaillages/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Grenaillage', '_api_operation_name' => '_api_/grenaillages/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1742 => [[['_route' => '_api_/jours/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Jours', '_api_operation_name' => '_api_/jours/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1769 => [
            [['_route' => '_api_/jours{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Jours', '_api_operation_name' => '_api_/jours{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/jours{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Jours', '_api_operation_name' => '_api_/jours{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1808 => [
            [['_route' => '_api_/jours/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Jours', '_api_operation_name' => '_api_/jours/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/jours/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Jours', '_api_operation_name' => '_api_/jours/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1855 => [[['_route' => '_api_/o_fs/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\OFs', '_api_operation_name' => '_api_/o_fs/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1882 => [
            [['_route' => '_api_/o_fs{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\OFs', '_api_operation_name' => '_api_/o_fs{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/o_fs{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\OFs', '_api_operation_name' => '_api_/o_fs{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1921 => [
            [['_route' => '_api_/o_fs/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\OFs', '_api_operation_name' => '_api_/o_fs/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/o_fs/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\OFs', '_api_operation_name' => '_api_/o_fs/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1951 => [[['_route' => 'update order of', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\OFs', '_api_operation_name' => 'update order of'], ['id'], ['PATCH' => 0], null, false, true, null]],
        1974 => [[['_route' => 'update regie of', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\OFs', '_api_operation_name' => 'update regie of'], ['id'], ['PATCH' => 0], null, false, true, null]],
        2025 => [[['_route' => '_api_/semaines/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Semaines', '_api_operation_name' => '_api_/semaines/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        2049 => [[['_route' => '_api_/semaines{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Semaines', '_api_operation_name' => '_api_/semaines{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        2067 => [[['_route' => '_api_/semaines/{id}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Semaines', '_api_operation_name' => '_api_/semaines/{id}_patch'], ['id'], ['PATCH' => 0], null, false, true, null]],
        2114 => [[['_route' => '_api_/stocks/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Stocks', '_api_operation_name' => '_api_/stocks/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        2141 => [
            [['_route' => '_api_/stocks{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Stocks', '_api_operation_name' => '_api_/stocks{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/stocks{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Stocks', '_api_operation_name' => '_api_/stocks{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2180 => [
            [['_route' => '_api_/stocks/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Stocks', '_api_operation_name' => '_api_/stocks/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => '_api_/stocks/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Stocks', '_api_operation_name' => '_api_/stocks/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        2206 => [[['_route' => 'faire la sortie du stock', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Stocks', '_api_operation_name' => 'faire la sortie du stock'], ['id'], ['PATCH' => 0], null, false, true, null]],
        2239 => [[['_route' => 'faire un nombre d entrees dans stock', '_controller' => 'App\\Controller\\CreateStockController', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Stocks', '_api_operation_name' => 'faire un nombre d entrees dans stock'], ['articleId', 'nombre'], ['POST' => 0], null, false, true, null]],
        2292 => [[['_route' => '_api_/surface_couches/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SurfaceCouches', '_api_operation_name' => '_api_/surface_couches/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        2319 => [
            [['_route' => '_api_/surface_couches{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SurfaceCouches', '_api_operation_name' => '_api_/surface_couches{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/surface_couches{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SurfaceCouches', '_api_operation_name' => '_api_/surface_couches{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2358 => [
            [['_route' => '_api_/surface_couches/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SurfaceCouches', '_api_operation_name' => '_api_/surface_couches/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/surface_couches/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SurfaceCouches', '_api_operation_name' => '_api_/surface_couches/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2405 => [[['_route' => '_api_/systemes/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Systemes', '_api_operation_name' => '_api_/systemes/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        2432 => [
            [['_route' => '_api_/systemes{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Systemes', '_api_operation_name' => '_api_/systemes{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
            [['_route' => '_api_/systemes{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Systemes', '_api_operation_name' => '_api_/systemes{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
        ],
        2471 => [
            [['_route' => '_api_/systemes/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Systemes', '_api_operation_name' => '_api_/systemes/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/systemes/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Systemes', '_api_operation_name' => '_api_/systemes/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2517 => [[['_route' => '_api_/users/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Users', '_api_operation_name' => '_api_/users/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        2544 => [
            [['_route' => '_api_/users{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Users', '_api_operation_name' => '_api_/users{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/users{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Users', '_api_operation_name' => '_api_/users{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2563 => [[['_route' => '_api_/users/{id}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Users', '_api_operation_name' => '_api_/users/{id}_patch'], ['id'], ['PATCH' => 0], null, false, true, null]],
        2603 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
