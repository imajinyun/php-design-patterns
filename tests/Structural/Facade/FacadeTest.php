<?php

namespace DesignPattern\Test\Structural\Facade;

use DesignPattern\Structural\Facade\BiosInterface;
use DesignPattern\Structural\Facade\Facade;
use DesignPattern\Structural\Facade\MacOSInterface;
use PHPUnit\Framework\TestCase;

class FacadeTest extends TestCase
{
    public function testComputerTurnOnAndOff()
    {
        $macOS = $this->getMacOSMock();
        $bios = $this->getBiosMock();

        $bios->expects($this->once())
            ->method('launch')
            ->with($macOS);

        $facade = new Facade($bios, $macOS);
        $facade->turnOn();
        $facade->turnOff();

        self::assertEquals('Mac Pro', $macOS->getName());
    }

    protected function getMacOSMock()
    {
        $macOS = $this->createMock(MacOSInterface::class);
        $macOS->method('getName')
            ->will($this->returnValue('Mac Pro'));

        return $macOS;
    }

    protected function getBiosMock()
    {
        $bios = $this->getMockBuilder(BiosInterface::class)
            ->setMethods([
                'launch',
                'execute',
                'waitingForPressAnyKey',
                'powerOn',
                'powerOff',
            ])
            ->disableAutoload()
            ->getMock();

        return $bios;
    }
}
