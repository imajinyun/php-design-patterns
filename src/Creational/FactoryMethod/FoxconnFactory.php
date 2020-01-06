<?php

declare(strict_types=1);

namespace DesignPattern\Creational\FactoryMethod;

class FoxconnFactory extends FactoryMethod
{
    /**
     * {@inheritdoc}
     *
     * @param string $brand
     *
     * @return \DesignPattern\Creational\FactoryMethod\NotebookInterface
     *
     * @throws \InvalidArgumentException
     */
    public function createNotebook(string $brand): NotebookInterface
    {
        $brand = strtolower(trim($brand));
        switch ((int) $brand) {
            case parent::LOW_CONFIG:
                return new MacBookAir();
            case parent::MEDIUM_CONFIG:
                return new MacBook();
            case parent::HIGH_CONFIG:
                return new MacBookPro();
            default:
                throw new \InvalidArgumentException("Do not produce $brand brand notebook.");
        }
    }
}
