<?php

namespace DesignPattern\Creational\Builder\Component;

abstract class Computer
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * Set component of computer.
     *
     * @param string $key
     * @param object $val
     */
    public function setComponent(string $key, $val)
    {
        $this->data[$key] = $val;
    }
}
