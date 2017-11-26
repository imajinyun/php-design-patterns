<?php

namespace DesignPattern\Creational\AbstractFactory;

abstract class Image implements RendererInterface
{
    /**
     * @var string
     */
    protected $path;

    /**
     * @var string
     */
    protected $title = '';

    /**
     * Image constructor.
     *
     * @param string $path
     * @param string $title
     */
    public function __construct(string $path, string $title = '')
    {
        $this->path = $path;
        $this->title = $title;
    }
}
