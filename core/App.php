<?php

declare(strict_types=1);

namespace core;

use App\Exceptions\RouteNotFoundException;
use DI\Container;
use DI\DependencyException;
use DI\NotFoundException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class App
{
    private static DB $em;
    private Config $config;

    public function __construct(
        private readonly Container $container,
        private readonly ?Router $router = null,
        private array $request = []
    ) {
        static::$em = new DB($config->db ?? []);
    }


    public static function db(): DB
    {
        return static::$em;
    }

    public function boot(): static
    {
        $twig = new Environment(
            new FilesystemLoader(VIEW_PATH),
            [
                'auto_reload' => true,
            ]
        );

        // TODO: add db booting via singleton
        return $this;
    }

    public function run()
    {
        try {
            echo $this->router->resolve($this->request['uri'], strtolower($this->request['method']));
        } catch (RouteNotFoundException) {
            http_response_code(404);

            echo $this->container->get(Environment::class)->render('error/404.twig');
        } catch (DependencyException|NotFoundException $e) {
        }
    }
}