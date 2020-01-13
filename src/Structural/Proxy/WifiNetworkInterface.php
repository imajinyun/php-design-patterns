<?php

declare(strict_types=1);

namespace DesignPattern\Structural\Proxy;

interface WifiNetworkInterface
{
    /**
     * Grant access to the Wifi network to an employee.
     *
     * @param \DesignPattern\Structural\Proxy\Employee $employee
     *
     * @return bool
     */
    public function grantAccess(Employee $employee): bool;
}
