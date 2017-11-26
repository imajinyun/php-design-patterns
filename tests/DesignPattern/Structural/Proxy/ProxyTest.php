<?php

namespace DesignPattern\Test\Structural\Proxy;

use DesignPattern\Structural\Proxy\Employee;
use DesignPattern\Structural\Proxy\WifiNetwork;
use DesignPattern\Structural\Proxy\WifiNetworkProxy;
use PHPUnit\Framework\TestCase;

class ProxyTest extends TestCase
{
    /**
     * @var \DesignPattern\Structural\Proxy\WifiNetworkInterface
     */
    private $wifiNetwork;

    /**
     * @var \DesignPattern\Structural\Proxy\WifiNetworkProxy
     */
    private $wifiNetworkProxy;

    protected function setUp()
    {
        $this->wifiNetwork = new WifiNetwork('MyCompanyWifi');
        $this->wifiNetworkProxy = new WifiNetworkProxy('MyCompanyWifiProxy');
    }

    public function testInterfaceImplementation()
    {
        self::assertInstanceOf(WifiNetwork::class, $this->wifiNetwork);
        self::assertInstanceOf(WifiNetworkProxy::class, $this->wifiNetworkProxy);
    }

    public function testWifiNetworkAccess()
    {
        $allow1 = new Employee('Amy', 'pass', Employee::ACCESS_LEVEL_ALLOW);
        self::assertTrue($this->wifiNetwork->grantAccess($allow1));

        $allow2 = new Employee('Andy', '', Employee::ACCESS_LEVEL_DENY);
        self::assertTrue($this->wifiNetwork->grantAccess($allow2));
    }

    public function testWifiNetworkProxyAccess()
    {
        $allow = new Employee('Amy', 'pass', Employee::ACCESS_LEVEL_ALLOW);
        self::assertTrue($this->wifiNetworkProxy->grantAccess($allow));

        $deny = new Employee('Andy', '', Employee::ACCESS_LEVEL_DENY);
        self::assertFalse($this->wifiNetworkProxy->grantAccess($deny));
    }
}
