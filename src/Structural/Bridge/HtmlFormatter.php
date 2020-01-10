<?php

declare(strict_types=1);

namespace DesignPattern\Structural\Bridge;

class HtmlFormatter implements FormatterInterface
{
    /**
     * Format string to HTML.
     *
     * @param string $string
     *
     * @return string
     */
    public function format(string $string): string
    {
        return sprintf('<p>%s</p>', $string);
    }
}
