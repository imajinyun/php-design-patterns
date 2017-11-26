<?php

namespace DesignPattern\Creational\StaticFactory;

interface FormatterInterface
{
    /**
     * Format value.
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public function format($value);
}
