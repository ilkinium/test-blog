<?php

declare(strict_types=1);

use App\Controllers\CommentController;
use App\Controllers\PostController;
use core\App;
use core\Router;
use DI\Container;

$app = require __DIR__ . '/../bootstrap.php';

$container = new Container();
$router    = new Router($container);

$router->registerRoutesFromControllerAttributes(
    [
        PostController::class,
        CommentController::class
    ]
);

(new App(
    $container,
    $router,
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']]
))->boot()->run();