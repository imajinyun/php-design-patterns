<?php

namespace DesignPattern\Structural\Facade;

class Bios implements BiosInterface
{
    /**
     * @return string
     */
    public function execute() : string
    {
        return 'Command is executing...';
    }

    /**
     * @param \DesignPattern\Structural\Facade\MacOSInterface $macOS
     *
     * @return mixed
     */
    public function launch(MacOSInterface $macOS)
    {
        return $macOS->launch();
    }

    /**
     * @return bool
     */
    public function waitingForPressAnyKey() : bool
    {
        return true;
    }

    /**
     * @return bool
     */
    public function powerOn() : bool
    {
        return true;
    }

    /**
     * @return bool
     */
    public function powerOff() : bool
    {
        return true;
    }
}
