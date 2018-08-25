<?php

namespace DesignPattern\Creational\FactoryMethod;

class MacBookAir implements NotebookInterface
{
    /**
     * @var string
     */
    protected $color;

    /**
     * Sets the color of the MacBookAir.
     *
     * @param string $color
     */
    public function setColor(string $color)
    {
        $this->color = $color;
    }
}
