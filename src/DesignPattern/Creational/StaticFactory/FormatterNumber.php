<?php

namespace DesignPattern\Creational\StaticFactory;

class FormatterNumber implements FormatterInterface
{
    /**
     * Format value.
     *
     * @param mixed $value
     *
     * @return int
     */
    public function format($value) : int
    {
        return (int)$value;
    }
}
