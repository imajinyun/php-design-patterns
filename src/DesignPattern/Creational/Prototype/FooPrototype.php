<?php

namespace DesignPattern\Creational\Prototype;

class FooPrototype extends Prototype
{
    /**
     * @var string
     */
    protected $category = 'Foo';

    /**
     * Empty clone.
     *
     * @return string
     */
    public function __clone()
    {
    }
}
