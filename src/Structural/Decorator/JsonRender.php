<?php

declare(strict_types=1);

namespace DesignPattern\Structural\Decorator;

class JsonRender extends RendererDecorator
{
    /**
     * @return string
     */
    public function render(): string
    {
        return json_encode($this->renderable->render(), JSON_THROW_ON_ERROR, 512);
    }
}
