<?php

namespace DesignPattern\Structural\Decorator;

class JsonRender extends RendererDecorator
{
    /**
     * @return string
     */
    public function render(): string
    {
        return json_encode($this->renderable->render());
    }
}
