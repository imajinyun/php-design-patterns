<?php

declare(strict_types=1);

namespace DesignPattern\Structural\DependencyInjection;

interface GeolocationServiceInterface
{
    /**
     * Get coordinate from address.
     *
     * @param string $address
     *
     * @return string
     */
    public function getCoordinateFromAddress(string $address): string;
}
