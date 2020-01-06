<?php

declare(strict_types=1);

namespace DesignPattern\Creational\Prototype;

class FooPrototype extends Prototype
{
    /**
     * Empty clone.
     */
    public function __clone()
    {
    }
}
