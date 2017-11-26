<?php

namespace DesignPattern\Structural\Proxy;

class WifiNetwork implements WifiNetworkInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * WifiNetwork constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Grant access to the WiFi network to an employee.
     *
     * @param \DesignPattern\Structural\Proxy\Employee $employee
     *
     * @return bool
     */
    public function grantAccess(Employee $employee) : bool
    {
        return true;
    }
}
