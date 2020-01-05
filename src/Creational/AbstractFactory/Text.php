<?php

declare(strict_types=1);

namespace DesignPattern\Creational\AbstractFactory;

abstract class Text implements RendererInterface
{
    /**
     * @var string
     */
    protected string $text;

    /**
     * Text constructor.
     *
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }
}
