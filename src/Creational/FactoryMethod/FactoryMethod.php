<?php

declare(strict_types=1);

namespace DesignPattern\Creational\FactoryMethod;

abstract class FactoryMethod
{
    public const LOW_CONFIG = 1;
    public const MEDIUM_CONFIG = 2;
    public const HIGH_CONFIG = 3;
    public const GENERAL_CONFIG = 4;

    /**
     * The children of the class must implement this method.
     *
     * @param string $brand
     *
     * @return mixed
     */
    abstract public function createNotebook(string $brand);

    /**
     * Create a new Notebook.
     *
     * @param string $brand
     *
     * @return \DesignPattern\Creational\FactoryMethod\NotebookInterface
     */
    public function create(string $brand): NotebookInterface
    {
        $object = $this->createNotebook($brand);
        $object->setColor('#000');

        return $object;
    }
}
