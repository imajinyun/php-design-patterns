<?php

declare(strict_types=1);

namespace DesignPattern\Creational\Builder\Component;

abstract class Computer
{
    /**
     * @var array
     */
    private array $data = [];

    /**
     * Set component of computer.
     *
     * @param  string  $key
     * @param  object  $val
     *
     * @return void
     */
    public function setComponent(string $key, $val): void
    {
        $this->data[$key] = $val;
    }
}
