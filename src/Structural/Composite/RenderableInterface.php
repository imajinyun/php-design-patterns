<?php

declare(strict_types=1);

namespace DesignPattern\Structural\Composite;

interface RenderableInterface
{
    /**
     * Render HTML element.
     *
     * @return string
     */
    public function render(): string;
}
