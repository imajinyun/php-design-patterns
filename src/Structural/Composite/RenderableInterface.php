<?php

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
