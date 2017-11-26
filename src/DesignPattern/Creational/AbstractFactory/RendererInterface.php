<?php

namespace DesignPattern\Creational\AbstractFactory;

interface RendererInterface
{
    /**
     * Render from Json or Html output.
     *
     * @return string
     */
    public function render() : string;
}
