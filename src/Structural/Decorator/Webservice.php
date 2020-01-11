<?php

declare(strict_types=1);

namespace DesignPattern\Structural\Decorator;

class Webservice implements RenderableInterface
{
    /**
     * @var string
     */
    private string $data;

    /**
     * Webservice constructor.
     *
     * @param string $data
     */
    public function __construct(string $data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return $this->data;
    }
}
