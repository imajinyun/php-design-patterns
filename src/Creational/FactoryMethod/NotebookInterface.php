<?php

declare(strict_types=1);

namespace DesignPattern\Creational\FactoryMethod;

interface NotebookInterface
{
    /**
     * Set the color of the Notebook.
     *
     * @param string $color
     *
     * @return mixed
     */
    public function setColor(string $color);
}
