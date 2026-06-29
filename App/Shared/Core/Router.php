<?php

namespace App\Shared\Core;

use App\Shared\Container\Container;


class Router
{
    private array $routes = [];

    private Container $container;


    public function __construct(
        Container $container
    ) {
        $this->container = $container;
    }

    public function get(
        string $uri,
        array $action
    ): void {

        $this->addRoute(
            'GET',
            $uri,
            $action
        );
    }
    public function post(
        string $uri,
        array $action
    ): void {

        $this->addRoute(
            'POST',
            $uri,
            $action
        );
    }
    private function addRoute(
        string $method,
        string $uri,
        array $action
    ): void {

        $this->routes[] = new Route(
            $method,
            $uri,
            $action
        );
    }
    public function dispatch(
        string $uri,
        string $method
    ): void {

        $uri = $this->cleanUri($uri);

        foreach ($this->routes as $route) {

            if (
                $route->getMethod() === $method &&
                $route->getUri() === $uri
            ) {

                $this->execute(
                    $route->getAction()
                );

                return;
            }
        }

        $this->notFound();
    }
    private function execute(
        array $action
    ): void {

        [
            $controller,
            $method
        ] = $action;

        $controllerObject = $this->container->resolve(
            $controller
        );

        $controllerObject->$method();
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