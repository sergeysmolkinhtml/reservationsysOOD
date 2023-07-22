<?php

use DI\ContainerBuilder;

require_once '../vendor/autoload.php';
use \League\Plates\Engine;
$containerBuilder = new ContainerBuilder();

$containerBuilder->useAutowiring(true);
$containerBuilder->useAttributes(true);

$containerBuilder->addDefinitions([
    Engine::class => function () {

        return new Engine('../src/Views/frontend');
    },
]);

$container = $containerBuilder->build();



$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/sga',['App\Http\Controllers\HotelController', 'index']);
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