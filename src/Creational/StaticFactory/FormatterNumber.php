<?php

declare(strict_types=1);

namespace DesignPattern\Creational\StaticFactory;

class FormatterNumber implements FormatterInterface
{
    /**
     * Format value.
     *
     * @param  mixed  $value
     *
     * @return int
     */
    public function format($value): int
    {
        return (int)$value;
    }
}
