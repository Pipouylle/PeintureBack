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
                            .'|ntexts/([^.]+)(?:\\.(jsonld))?(*:336)'
                            .'|mmandes(?'
                                .'|(?:\\.([^/]++))?(*:369)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:403)'
                                .'|(?:\\.([^/]++))?(*:426)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:460)'
                            .')'
                            .'|uches(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:503)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:529)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:567)'
                                .')'
                            .')'
                        .')'
                        .'|validation_errors/([^/]++)(?'
                            .'|(*:607)'
                        .')'
                        .'|a(?'
                            .'|ffaires(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:656)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:682)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:720)'
                                .')'
                            .')'
                            .'|rticle(?'
                                .'|_couches(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:776)'
                                    .'|(?:\\.([^/]++))?(*:799)'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:833)'
                                    .'|(?:\\.([^/]++))?(*:856)'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:890)'
                                .')'
                                .'|s(?'
                                    .'|ArticleCouche/([^/]++)(?'
                                        .'|(*:928)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:963)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:989)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:1027)'
                                    .')'
                                .')'
                                .'|Couche(?'
                                    .'|Demande/([^/]++)(*:1063)'
                                    .'|/([^/]++)(*:1081)'
                                .')'
                            .')'
                            .'|vancement_surface_couches(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1146)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1173)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1212)'
                                .')'
                            .')'
                            .'|llAvancement(?'
                                .'|Semaine/([^/]++)(*:1254)'
                                .'|Demande/([^/]++)(*:1279)'
                            .')'
                        .')'
                        .'|modifAvancement/([^/]++)(*:1314)'
                        .'|grenaillages(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1364)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1391)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1430)'
                            .')'
                        .')'
                        .'|jours(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1475)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1502)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1541)'
                            .')'
                        .')'
                        .'|o(?'
                            .'|_fs(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1588)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1615)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1654)'
                                .')'
                            .')'
                            .'|fs(?'
                                .'|Order/([^/]++)(*:1684)'
                                .'|Regie/([^/]++)(*:1707)'
                            .')'
                        .')'
                        .'|s(?'
                            .'|emaines(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1758)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1785)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1824)'
                                .')'
                            .')'
                            .'|tock(?'
                                .'|s(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1872)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:1899)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:1938)'
                                    .')'
                                .')'
                                .'|Sortie/([^/]++)(*:1964)'
                            .')'
                            .'|urface_couches(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:2017)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:2044)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:2083)'
                                .')'
                            .')'
                            .'|ystemes(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:2130)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:2157)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:2196)'
                                .')'
                            .')'
                        .')'
                        .'|users(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:2242)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:2269)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:2308)'
                            .')'
                        .')'
                    .')'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:2349)'
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
        336 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        369 => [[['_route' => '_api_/commandes{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Commandes', '_api_operation_name' => '_api_/commandes{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        403 => [[['_route' => '_api_/commandes/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Commandes', '_api_operation_name' => '_api_/commandes/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        426 => [[['_route' => '_api_/commandes{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Commandes', '_api_operation_name' => '_api_/commandes{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        460 => [[['_route' => '_api_/commandes/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Commandes', '_api_operation_name' => '_api_/commandes/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null]],
        503 => [[['_route' => '_api_/couches/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Couches', '_api_operation_name' => '_api_/couches/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        529 => [
            [['_route' => '_api_/couches{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Couches', '_api_operation_name' => '_api_/couches{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/couches{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Couches', '_api_operation_name' => '_api_/couches{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        567 => [
            [['_route' => '_api_/couches/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Couches', '_api_operation_name' => '_api_/couches/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/couches/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Couches', '_api_operation_name' => '_api_/couches/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => '_api_/couches/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Couches', '_api_operation_name' => '_api_/couches/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        607 => [
            [['_route' => '_api_validation_errors_problem', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_problem'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_hydra', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_hydra'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_jsonapi', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_jsonapi'], ['id'], ['GET' => 0], null, false, true, null],
        ],
        656 => [[['_route' => '_api_/affaires/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Affaires', '_api_operation_name' => '_api_/affaires/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        682 => [
            [['_route' => '_api_/affaires{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Affaires', '_api_operation_name' => '_api_/affaires{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/affaires{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Affaires', '_api_operation_name' => '_api_/affaires{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        720 => [
            [['_route' => '_api_/affaires/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Affaires', '_api_operation_name' => '_api_/affaires/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => '_api_/affaires/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Affaires', '_api_operation_name' => '_api_/affaires/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/affaires/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Affaires', '_api_operation_name' => '_api_/affaires/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        776 => [[['_route' => '_api_/article_couches/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => '_api_/article_couches/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        799 => [[['_route' => '_api_/article_couches{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => '_api_/article_couches{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        833 => [[['_route' => '_api_/article_couches/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => '_api_/article_couches/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null]],
        856 => [[['_route' => '_api_/article_couches{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => '_api_/article_couches{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        890 => [[['_route' => '_api_/article_couches/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => '_api_/article_couches/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null]],
        928 => [
            [['_route' => 'articles articleCouche', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => 'articles articleCouche'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'update articles articleCouche', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => 'update articles articleCouche'], ['id'], ['PATCH' => 0], null, false, true, null],
        ],
        963 => [[['_route' => '_api_/articles/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Articles', '_api_operation_name' => '_api_/articles/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        989 => [
            [['_route' => '_api_/articles{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Articles', '_api_operation_name' => '_api_/articles{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/articles{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Articles', '_api_operation_name' => '_api_/articles{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1027 => [
            [['_route' => '_api_/articles/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Articles', '_api_operation_name' => '_api_/articles/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => '_api_/articles/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Articles', '_api_operation_name' => '_api_/articles/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        1063 => [[['_route' => 'articleCoucheDemande', '_controller' => 'App\\Controller\\ArticleCoucheDemandeController', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\ArticleCouche', '_api_operation_name' => 'articleCoucheDemande'], ['CommandeId'], ['GET' => 0], null, false, true, null]],
        1081 => [[['_route' => 'articleCoucheByDemande', '_controller' => 'App\\Controller\\ArticleCoucheByDemandeController', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Articles', '_api_operation_name' => 'articleCoucheByDemande'], ['demandeId'], ['GET' => 0], null, false, true, null]],
        1146 => [[['_route' => '_api_/avancement_surface_couches/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AvancementSurfaceCouches', '_api_operation_name' => '_api_/avancement_surface_couches/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1173 => [
            [['_route' => '_api_/avancement_surface_couches{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AvancementSurfaceCouches', '_api_operation_name' => '_api_/avancement_surface_couches{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/avancement_surface_couches{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AvancementSurfaceCouches', '_api_operation_name' => '_api_/avancement_surface_couches{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1212 => [
            [['_route' => '_api_/avancement_surface_couches/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AvancementSurfaceCouches', '_api_operation_name' => '_api_/avancement_surface_couches/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/avancement_surface_couches/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AvancementSurfaceCouches', '_api_operation_name' => '_api_/avancement_surface_couches/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1254 => [[['_route' => 'all avancement surface couches by semaine', '_controller' => 'App\\Controller\\AllAvancementSemaineController', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AvancementSurfaceCouches', '_api_operation_name' => 'all avancement surface couches by semaine'], ['semaineId'], ['GET' => 0], null, false, true, null]],
        1279 => [[['_route' => 'all avancement surface couches by demande', '_controller' => 'App\\Controller\\AllAvancementDemandeController', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AvancementSurfaceCouches', '_api_operation_name' => 'all avancement surface couches by demande'], ['demandeId'], ['GET' => 0], null, false, true, null]],
        1314 => [[['_route' => 'update avancement surface couches', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\AvancementSurfaceCouches', '_api_operation_name' => 'update avancement surface couches'], ['id'], ['PATCH' => 0], null, false, true, null]],
        1364 => [[['_route' => '_api_/grenaillages/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Grenaillage', '_api_operation_name' => '_api_/grenaillages/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1391 => [
            [['_route' => '_api_/grenaillages{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Grenaillage', '_api_operation_name' => '_api_/grenaillages{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/grenaillages{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Grenaillage', '_api_operation_name' => '_api_/grenaillages{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1430 => [
            [['_route' => '_api_/grenaillages/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Grenaillage', '_api_operation_name' => '_api_/grenaillages/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/grenaillages/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Grenaillage', '_api_operation_name' => '_api_/grenaillages/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1475 => [[['_route' => '_api_/jours/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Jours', '_api_operation_name' => '_api_/jours/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1502 => [
            [['_route' => '_api_/jours{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Jours', '_api_operation_name' => '_api_/jours{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/jours{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Jours', '_api_operation_name' => '_api_/jours{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1541 => [
            [['_route' => '_api_/jours/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Jours', '_api_operation_name' => '_api_/jours/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/jours/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Jours', '_api_operation_name' => '_api_/jours/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1588 => [[['_route' => '_api_/o_fs/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\OFs', '_api_operation_name' => '_api_/o_fs/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1615 => [
            [['_route' => '_api_/o_fs{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\OFs', '_api_operation_name' => '_api_/o_fs{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/o_fs{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\OFs', '_api_operation_name' => '_api_/o_fs{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1654 => [
            [['_route' => '_api_/o_fs/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\OFs', '_api_operation_name' => '_api_/o_fs/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/o_fs/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\OFs', '_api_operation_name' => '_api_/o_fs/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1684 => [[['_route' => 'update order of', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\OFs', '_api_operation_name' => 'update order of'], ['id'], ['PATCH' => 0], null, false, true, null]],
        1707 => [[['_route' => 'update regie of', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\OFs', '_api_operation_name' => 'update regie of'], ['id'], ['PATCH' => 0], null, false, true, null]],
        1758 => [[['_route' => '_api_/semaines/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Semaines', '_api_operation_name' => '_api_/semaines/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1785 => [
            [['_route' => '_api_/semaines{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Semaines', '_api_operation_name' => '_api_/semaines{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/semaines{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Semaines', '_api_operation_name' => '_api_/semaines{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1824 => [
            [['_route' => '_api_/semaines/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Semaines', '_api_operation_name' => '_api_/semaines/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/semaines/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Semaines', '_api_operation_name' => '_api_/semaines/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1872 => [[['_route' => '_api_/stocks/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Stocks', '_api_operation_name' => '_api_/stocks/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1899 => [
            [['_route' => '_api_/stocks{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Stocks', '_api_operation_name' => '_api_/stocks{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/stocks{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Stocks', '_api_operation_name' => '_api_/stocks{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1938 => [
            [['_route' => '_api_/stocks/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Stocks', '_api_operation_name' => '_api_/stocks/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => '_api_/stocks/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Stocks', '_api_operation_name' => '_api_/stocks/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        1964 => [[['_route' => 'faire la sortie du stock', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Stocks', '_api_operation_name' => 'faire la sortie du stock'], ['id'], ['PATCH' => 0], null, false, true, null]],
        2017 => [[['_route' => '_api_/surface_couches/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SurfaceCouches', '_api_operation_name' => '_api_/surface_couches/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        2044 => [
            [['_route' => '_api_/surface_couches{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SurfaceCouches', '_api_operation_name' => '_api_/surface_couches{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/surface_couches{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SurfaceCouches', '_api_operation_name' => '_api_/surface_couches{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2083 => [
            [['_route' => '_api_/surface_couches/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SurfaceCouches', '_api_operation_name' => '_api_/surface_couches/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/surface_couches/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\SurfaceCouches', '_api_operation_name' => '_api_/surface_couches/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2130 => [[['_route' => '_api_/systemes/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Systemes', '_api_operation_name' => '_api_/systemes/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        2157 => [
            [['_route' => '_api_/systemes{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Systemes', '_api_operation_name' => '_api_/systemes{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
            [['_route' => '_api_/systemes{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Systemes', '_api_operation_name' => '_api_/systemes{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
        ],
        2196 => [
            [['_route' => '_api_/systemes/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Systemes', '_api_operation_name' => '_api_/systemes/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/systemes/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Systemes', '_api_operation_name' => '_api_/systemes/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2242 => [[['_route' => '_api_/users/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Users', '_api_operation_name' => '_api_/users/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        2269 => [
            [['_route' => '_api_/users{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Users', '_api_operation_name' => '_api_/users{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/users{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Users', '_api_operation_name' => '_api_/users{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        2308 => [
            [['_route' => '_api_/users/{id}{._format}_patch', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Users', '_api_operation_name' => '_api_/users/{id}{._format}_patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
            [['_route' => '_api_/users/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Users', '_api_operation_name' => '_api_/users/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        2349 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
