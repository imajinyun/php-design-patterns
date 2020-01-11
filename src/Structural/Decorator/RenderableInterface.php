<?php

declare(strict_types=1);

namespace DesignPattern\Structural\Decorator;

interface RenderableInterface
{
    /**
     * @return string
     */
    public function render(): string;
}
