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
    $map->get('index','/',[

        'controller' => 'App\Controllers\IndexController',
        'action' => 'IndexAction'
    ]);
    $map->get('version','/version',[

        'controller' => 'App\Controllers\JSONController',
        'action' => 'versionAction'
    ]);
    $map->get('hero-adc','/hero-adc',[

        'controller' => 'App\Controllers\JSONController',
        'action' => 'heroADCAction'
    ]);
    $map->get('hero-counters','/hero-counters',[

        'controller' => 'App\Controllers\JSONController',
        'action' => 'heroCOuntersAction'
    ]);
    $map->get('hero-img','/hero-img',[

        'controller' => 'App\Controllers\JSONController',
        'action' => 'heroIMGAction'
    ]);
    $map->get('hero-info','/hero-info',[

        'controller' => 'App\Controllers\JSONController',
        'action' => 'heroInfoAction'
    ]);
    $map->get('hero-maps','/hero-maps',[

        'controller' => 'App\Controllers\JSONController',
        'action' => 'heroMapsAction'
    ]);
    $map->get('hero-synergies','/hero-synergies',[

        'controller' => 'App\Controllers\JSONController',
        'action' => 'heroSynergiesAction'
    ]);
    $map->get('hero-tiers','/hero-tiers',[

        'controller' => 'App\Controllers\JSONController',
        'action' => 'heroTiersAction'
    ]);
    $map->get('map-type','/map-type',[

        'controller' => 'App\Controllers\JSONController',
        'action' => 'mapTypeAction'
    ]);
    $map->get('map-info','/map-info',[

        'controller' => 'App\Controllers\JSONController',
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

        if($handlerData['controller'] == 'App\Controllers\JSONController'){

        
            $controllerName = $handlerData['controller'];
            $actionName = $handlerData['action'];
    
            $controller = new $controllerName;
            $response = $controller->$actionName();
            echo file_get_contents($response);
        }else{
    
            $controllerName = $handlerData['controller'];
            $actionName = $handlerData['action'];
    
            $controller = new $controllerName;
            $response = $controller->$actionName();
            include($response);
        }
    }