<?php

namespace DesignPattern\Structural\Decorator;

interface RenderableInterface
{
    /**
     * @return string
     */
    public function render() : string;
}
