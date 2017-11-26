<?php

namespace DesignPattern\Creational\StaticFactory;

class FormatterString implements FormatterInterface
{
    /**
     * Format value.
     *
     * @param mixed $value
     *
     * @return string
     */
    public function format($value)
    {
        return (string)trim($value);
    }
}
