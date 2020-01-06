<?php

declare(strict_types=1);

namespace DesignPattern\Creational\FactoryMethod;

class MacBookPro implements NotebookInterface
{
    /**
     * @var string
     */
    protected string $color;

    /**
     * Sets the color of the MacBookPro.
     *
     * @param string $color
     */
    public function setColor(string $color)
    {
        $this->color = $color;
    }
}
