<?php

namespace DesignPattern\Behavioral\Command;

class Computer
{
    /**
     * @return void
     */
    public function startup() : void
    {
        echo 'System is starting up...';
    }

    /**
     * @return void
     */
    public function shutdown() : void
    {
        echo 'System is shutting down...';
    }
}
