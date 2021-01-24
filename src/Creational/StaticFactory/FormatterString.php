<?php

declare(strict_types=1);

namespace DesignPattern\Creational\StaticFactory;

class FormatterString implements FormatterInterface
{
    /**
     * Format value.
     *
     * @param  mixed  $value
     *
     * @return string
     */
    public function format($value): string
    {
        return (string)trim($value);
    }
}
