<?php

namespace DesignPattern\Structural\DependencyInjection;

class DepartmentStore
{
    /**
     * @var \DesignPattern\Structural\DependencyInjection\AbstractMap
     */
    private $mapService;

    /**
     * DepartmentStore constructor.
     *
     * @param \DesignPattern\Structural\DependencyInjection\AbstractMap $mapService
     */
    public function __construct(AbstractMap $mapService)
    {
        $this->mapService = $mapService;
    }

    /**
     * Get store coordinate.
     *
     * @param string $address
     *
     * @return string
     * @throws \InvalidArgumentException
     */
    public function getStoreCoordinate(string $address) : string
    {
        if (empty($address)) {
            throw new \InvalidArgumentException('Please enter the address.');
        }

        return $this->mapService->getCoordinateFromAddress($address);
    }
}
