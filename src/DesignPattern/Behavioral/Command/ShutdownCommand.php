<?php

namespace DesignPattern\Behavioral\Command;

class ShutdownCommand implements CommandInterface
{
    /**
     * @var \DesignPattern\Behavioral\Command\Computer
     */
    private $computer;

    /**
     * ShutdownCommand constructor.
     *
     * @param \DesignPattern\Behavioral\Command\Computer $computer
     */
    public function __construct(Computer $computer)
    {
        $this->computer = $computer;
    }

    /**
     * Execute a command.
     *
     * @return void
     */
    public function execute(): void
    {
        $this->computer->shutdown();
    }
}
