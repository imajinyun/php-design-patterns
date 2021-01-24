<?php

declare(strict_types=1);

namespace DesignPattern\Creational\Multiton;

final class Multiton
{
    use MultitonTrait;

    /**
     * @var string
     */
    public string $value;

    /**
     * Multiton constructor.
     *
     * @param  string  $value
     */
    private function __construct(string $value)
    {
        $this->value = $value;
    }
}
