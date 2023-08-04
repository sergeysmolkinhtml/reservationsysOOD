<?php

use App\Http\Controllers\HotelController;
use App\Repositories\HotelRepository;
use App\Repositories\Interfaces\HotelRepositoryInterface;
use App\Services\HotelService;
use Aura\SqlQuery\QueryFactory;
use DI\Container;
use DI\ContainerBuilder;
use League\Plates\Engine;
use App\Repositories\Interfaces\AvailableHotelsRepositoryInterface;

require_once '../vendor/autoload.php';



$containerBuilder = new ContainerBuilder();
$containerBuilder->useAutowiring(true);
$containerBuilder->useAttributes(true);

$containerBuilder->addDefinitions([
    Engine::class => function () {
        return new Engine('../src/Views/frontend');
    },
    QueryFactory::class => function () {
        return new QueryFactory('mysql');
    },
    HotelRepositoryInterface::class => function (Container $container) {
        return new HotelRepository($container->get(\Aura\SqlQuery\QueryFactory::class));
    },
    HotelService::class => function (Container $container) {
        return new HotelService(
            $container->get(HotelRepositoryInterface::class),
            new \App\Modules\EventDispatcher()
        );
    },
    AvailableHotelsRepositoryInterface::class => function(Container $container) {
        return new \App\Repositories\AvailableHotelsRepository();
    },
    HotelController::class => function (Container $container) {
        return new HotelController(
            $container->get(Engine::class),
            $container->get(AvailableHotelsRepositoryInterface::class),
            $container->get(HotelService::class)
        );
    }
]);

$container = $containerBuilder->build();



$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/hotels',['App\Http\Controllers\HotelController', 'index']);
    $r->addRoute('GET', '/hotels/city/weather/{id:\d+}',['App\Http\Controllers\HotelController', 'index']);
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        var_dump('Not found');
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        var_dump('Not allowed');
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $container->call($routeInfo[1], $routeInfo[2]);
        break;
}