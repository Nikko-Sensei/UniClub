<?php

namespace App\Shared\Core;

class Request
{
    public function all(): array
    {
        return array_merge(
            $_GET,
            $_POST
        );
    }

    public function input(
        string $key,
        mixed $default = null
    ): mixed {

        return $_POST[$key]
            ?? $_GET[$key]
            ?? $default;
    }

    public function has(
        string $key
    ): bool {

        return isset($_POST[$key])
            || isset($_GET[$key]);
    }

    public function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function uri(): string
    {
        return parse_url(
            $_SERVER['REQUEST_URI'],
            PHP_URL_PATH
        );
    }
}