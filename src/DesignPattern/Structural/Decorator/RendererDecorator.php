<?php

namespace DesignPattern\Structural\Decorator;

abstract class RendererDecorator
{
    /**
     * @var \DesignPattern\Structural\Decorator\RenderableInterface
     */
    protected $renderable;

    /**
     * RenderDecorator constructor.
     *
     * @param \DesignPattern\Structural\Decorator\RenderableInterface $renderable
     */
    public function __construct(RenderableInterface $renderable)
    {
        $this->renderable = $renderable;
    }
}
