<?php

declare(strict_types=1);

namespace DesignPattern\Creational\AbstractFactory;

abstract class Image implements RendererInterface
{
    /**
     * @var string
     */
    protected string $path;

    /**
     * @var string
     */
    protected string $title = '';

    /**
     * Image constructor.
     *
     * @param  string  $path
     * @param  string  $title
     */
    public function __construct(string $path, string $title = '')
    {
        $this->path = $path;
        $this->title = $title;
    }
}
