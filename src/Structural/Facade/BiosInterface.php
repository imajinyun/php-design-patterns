<?php

declare(strict_types=1);

namespace DesignPattern\Structural\Facade;

interface BiosInterface
{
    public function execute();

    /**
     * Launch the operating system.
     *
     * @param  \DesignPattern\Structural\Facade\MacOSInterface  $macOS
     *
     * @return mixed
     */
    public function launch(MacOSInterface $macOS);

    public function waitingForPressAnyKey();

    public function powerOn();

    public function powerOff();
}
