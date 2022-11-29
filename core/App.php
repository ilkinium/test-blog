<?php

declare(strict_types=1);

namespace core;

use App\Exceptions\RouteNotFoundException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class App
{
    private static DB $em;

    public function __construct(
        private Container $container,
        private Router $router,
        private array $request,
        private Config $config
    ) {
        static::$em = new DB($config->db ?? []);
    }

    public static function db(): DB
    {
        return static::$em;
    }

    public function run()
    {
        try {
            echo $this->router->resolve($this->request['uri'], strtolower($this->request['method']));
        } catch (RouteNotFoundException) {
            http_response_code(404);

            // TODO: render error view
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
        }
    }
}