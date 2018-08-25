<?php

namespace DesignPattern\Creational\FactoryMethod;

class FoxconnFactory extends FactoryMethod
{
    /**
     * {@inheritdoc}
     *
     * @param string $brand
     *
     * @throws \InvalidArgumentException
     * @return MacBook|MacBookAir|MacBookPro
     */
    public function createNotebook(string $brand)
    {
        $brand = strtolower(trim($brand));
        switch ($brand) {
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
