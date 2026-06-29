<?php

namespace App\Shared\Container;


class Container
{
    private array $bindings = [];

    public function bind(
        string $abstract,
        callable $concrete
    ): void {

        $this->bindings[$abstract] = $concrete;
    }

    public function resolve(
        string $abstract
    ) {

        if (isset($this->bindings[$abstract])) {

            return ($this->bindings[$abstract])($this);
        }

        throw new \Exception(
            "Binding not found: " . $abstract
        );
    }
}