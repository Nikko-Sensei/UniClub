<?php

namespace App\Shared\Core;


class Route
{
    private string $method;
    private string $uri;
    private array $action;
    private array $middlewares;

    public function __construct(
        string $method,
        string $uri,
        array $action,
        array $middlewares = []
    ) {

        $this->method = $method;

        $this->uri = $uri;

        $this->action = $action;

        $this->middlewares = $middlewares;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getAction(): array
    {
        return $this->action;
    }

    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}