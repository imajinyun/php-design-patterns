<?php

declare(strict_types=1);

namespace DesignPattern\Creational\FactoryMethod;

class MacBook implements NotebookInterface
{
    /**
     * @var string
     */
    protected string $color;

    /**
     * Sets the color of the MacBook.
     *
     * @param string $color
     */
    public function setColor(string $color)
    {
        $this->color = $color;
    }
}
