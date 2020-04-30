<?php

    require_once '../vendor/autoload.php';

    use Aura\Router\RouterContainer;

    $request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(

        $_SERVER,
        $_GET,
        $_POST,
        $_COOKIE,
        $_FILES
    );

    $routerContainer = new RouterContainer();
    $map = $routerContainer->getMap();
    $map->get('hero-adc','/hero-adc',[

        'controller' => 'App\Controllers\IndexController',
        'action' => 'heroADCAction'
    ]);
    $map->get('hero-counters','/hero-counters',[
        'controller' => 'App\Controllers\IndexController',
        'action' => 'heroCOuntersAction'
    ]);
    $map->get('hero-img','/hero-img',[

        'controller' => 'App\Controllers\IndexController',
        'action' => 'heroIMGAction'
    ]);
    $map->get('hero-info','/hero-info',[

        'controller' => 'App\Controllers\IndexController',
        'action' => 'heroInfoAction'
    ]);
    $map->get('hero-maps','/hero-maps',[

        'controller' => 'App\Controllers\IndexController',
        'action' => 'heroMapsAction'
    ]);
    $map->get('hero-synergies','/hero-synergies',[
        'controller' => 'App\Controllers\IndexController',
        'action' => 'heroSynergiesAction'
    ]);
    $map->get('hero-tiers','/hero-tiers',[

        'controller' => 'App\Controllers\IndexController',
        'action' => 'heroTiersAction'
    ]);
    $map->get('map-type','/map-type',[

        'controller' => 'App\Controllers\IndexController',
        'action' => 'mapTypeAction'
    ]);
    $map->get('map-info','/map-info',[

        'controller' => 'App\Controllers\IndexController',
        'action' => 'mapInfoAction'
    ]);

    $matcher = $routerContainer->getMatcher();
    $route = $matcher->match($request);

    if(!$route){

        $controllerName = 'App\Controllers\IndexController';

        $controller = new $controllerName;
        $response = $controller->indexAction();
        include($response);
    }else{

        $handlerData = $route->handler;
        $controllerName = $handlerData['controller'];
        $actionName = $handlerData['action'];

        $controller = new $controllerName;
        $response = $controller->$actionName();
        echo file_get_contents($response);
    }