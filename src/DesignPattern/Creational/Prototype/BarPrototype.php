<?php

namespace DesignPattern\Creational\Prototype;

class BarPrototype extends Prototype
{
    /**
     * @var string
     */
    protected $category = 'Bar';

    /**
     * Empty clone.
     *
     * @return null
     */
    public function __clone()
    {
    }
}
