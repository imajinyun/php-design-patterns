<?php

namespace DesignPattern\Behavioral\Command;

class Computer
{
    public function startup()
    {
        echo 'System is starting up...';
    }

    public function shutdown()
    {
        echo 'System is shutting down...';
    }
}
