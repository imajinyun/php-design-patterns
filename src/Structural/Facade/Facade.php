<?php

declare(strict_types=1);

namespace DesignPattern\Structural\Facade;

class Facade
{
    /**
     * @var \DesignPattern\Structural\Facade\BiosInterface
     */
    private BiosInterface $bios;

    /**
     * @var \DesignPattern\Structural\Facade\MacOSInterface
     */
    private MacOSInterface $macOS;

    /**
     * Facade constructor.
     *
     * @param \DesignPattern\Structural\Facade\BiosInterface $bios
     * @param \DesignPattern\Structural\Facade\MacOSInterface $macOS
     */
    public function __construct(BiosInterface $bios, MacOSInterface $macOS)
    {
        $this->bios = $bios;
        $this->macOS = $macOS;
    }

    public function turnOn(): void
    {
        $this->bios->powerOn();
        $this->bios->execute();
        $this->bios->waitingForPressAnyKey();
        $this->bios->launch($this->macOS);
    }

    public function turnOff(): void
    {
        $this->macOS->shutdown();
        $this->bios->powerOff();
    }
}
