<?php

namespace DesignPattern\Creational\AbstractFactory;

abstract class Text implements RendererInterface
{
    /**
     * @var string
     */
    protected $text;

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
