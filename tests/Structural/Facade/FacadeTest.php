<?php

declare(strict_types=1);

namespace DesignPattern\Test\Structural\Facade;

use DesignPattern\Structural\Facade\BiosInterface;
use DesignPattern\Structural\Facade\Facade;
use DesignPattern\Structural\Facade\MacOSInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class FacadeTest extends TestCase
{
    public function testComputerTurnOnAndOff(): void
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

    protected function getMacOSMock(): MockObject
    {
        $macOS = $this->createMock(MacOSInterface::class);
        $macOS->method('getName')
            ->willReturn('Mac Pro');

        return $macOS;
    }

    protected function getBiosMock(): MockObject
    {
        return $this->getMockBuilder(BiosInterface::class)
            ->onlyMethods(
                [
                    'launch',
                    'execute',
                    'waitingForPressAnyKey',
                    'powerOn',
                    'powerOff',
                ]
            )
            ->disableAutoload()
            ->getMock();
    }
}
