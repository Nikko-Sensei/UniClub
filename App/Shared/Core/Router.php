<?php

namespace App\Shared\Core;

use App\Shared\Container\Container;

class Router
{
    private array $routes = [];

    private Container $container;


    public function __construct(Container $container)
    {
        $this->container = $container;
    }


    public function get(
        string $uri,
        array $action,
        array $middlewares = []
    ): void {

        $this->addRoute(
            'GET',
            $uri,
            $action,
            $middlewares
        );
    }


    public function post(
        string $uri,
        array $action,
        array $middlewares = []
    ): void {

        $this->addRoute(
            'POST',
            $uri,
            $action,
            $middlewares
        );
    }


    private function addRoute(
        string $method,
        string $uri,
        array $action,
        array $middlewares = []
    ): void {

        $this->routes[] =
            new Route(
                $method,
                $uri,
                $action,
                $middlewares
            );
    }


    public function dispatch(
        string $uri,
        string $method
    ): void {

        $uri = $this->cleanUri($uri);


        foreach ($this->routes as $route) {

            if (
                $route->getMethod() !== $method
            ) {
                continue;
            }


            $params = $this->match(
                $route->getUri(),
                $uri
            );


            if ($params !== false) {

                $this->execute(
                    $route,
                    $params
                );

                return;
            }
        }


        $this->notFound();
    }


    private function execute(
        Route $route,
        array $params = []
    ): void {

        foreach (
            $route->getMiddlewares()
            as $middleware
        ) {

            $middlewareObject =
                $this->container->resolve(
                    $middleware
                );

            $middlewareObject->handle();
        }


        [
            $controller,
            $method
        ] = $route->getAction();


        $controllerObject =
            $this->container->resolve(
                $controller
            );


        $controllerObject->$method(
            ...$params
        );
    }


    private function match(
        string $routeUri,
        string $requestUri
    ): array|false {

        $pattern = preg_replace(
            '#\{[a-zA-Z_]+\}#',
            '([0-9]+)',
            $routeUri
        );


        $pattern = "#^" . $pattern . "$#";


        if (
            preg_match(
                $pattern,
                $requestUri,
                $matches
            )
        ) {

            array_shift($matches);

            return $matches;
        }


        return false;
    }


    private function cleanUri(
        string $uri
    ): string {

        $uri = parse_url(
            $uri,
            PHP_URL_PATH
        );


        $basePath = '/UniClub/Public';


        if (
            str_starts_with(
                $uri,
                $basePath
            )
        ) {

            $uri = substr(
                $uri,
                strlen($basePath)
            );
        }


        return $uri === ''
            ? '/'
            : $uri;
    }


    private function notFound(): void
    {
        http_response_code(404);

        echo "404 Page Not Found";

        exit;
    }
}