<?php

namespace DesignPattern\Creational\FactoryMethod;

class MacBookPro implements NotebookInterface
{
    /**
     * @var string
     */
    protected $color;

    /**
     * Sets the color of the MacBookPro.
     *
     * @param string $color
     *
     * @return void
     */
    public function setColor(string $color)
    {
        $this->color = $color;
    }
}
