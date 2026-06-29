<?php

namespace App\Shared\Core;

class Route
{
    private string $method;
    private string $uri;
    private array $action;

    public function __construct(
        string $method,
        string $uri,
        array $action
    ) {
        $this->method = $method;
        $this->uri = $uri;
        $this->action = $action;
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
}