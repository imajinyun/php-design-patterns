<?php

declare(strict_types=1);

namespace DesignPattern\Creational\Prototype;

class BarPrototype extends Prototype
{
    /**
     * Empty clone.
     */
    public function __clone()
    {
    }
}
