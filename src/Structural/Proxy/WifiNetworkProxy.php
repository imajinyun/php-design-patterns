<?php

namespace DesignPattern\Structural\Proxy;

class WifiNetworkProxy implements WifiNetworkInterface
{
    /**
     * @var \DesignPattern\Structural\Proxy\WifiNetwork
     */
    private $wifiNetwork;

    /**
     * WifiNetworkProxy constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->wifiNetwork = new WifiNetwork($name);
    }

    /**
     * Grant access to the WiFi network to an employee.
     *
     * @param \DesignPattern\Structural\Proxy\Employee $employee
     *
     * @return bool
     */
    public function grantAccess(Employee $employee): bool
    {
        if ($employee->getAccessLevel() === Employee::ACCESS_LEVEL_ALLOW) {
            return $this->wifiNetwork->grantAccess($employee);
        }

        return false;
    }
}
