<?php

declare(strict_types=1);

namespace DesignPattern\Structural\Decorator;

abstract class RendererDecorator
{
    /**
     * @var \DesignPattern\Structural\Decorator\RenderableInterface
     */
    protected RenderableInterface $renderable;

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
