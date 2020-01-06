<?php

declare(strict_types=1);

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
