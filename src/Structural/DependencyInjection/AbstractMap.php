<?php

declare(strict_types=1);

namespace DesignPattern\Structural\DependencyInjection;

abstract class AbstractMap implements GeolocationServiceInterface
{
    /**
     * Get coordinate from address.
     *
     * @param  string  $address
     *
     * @return string
     */
    public function getCoordinateFromAddress(string $address): string
    {
        $data = [
            'longtitude' => 120.19,
            'latitude' => 48.75,
            'address' => $address,
        ];
        sort($data);

        return json_encode($data, JSON_THROW_ON_ERROR, 512);
    }
}
