<?php

namespace DesignPattern\Behavioral\Command;

class StartupCommand implements CommandInterface
{
    /**
     * @var \DesignPattern\Behavioral\Command\Computer
     */
    private $computer;

    /**
     * StartupCommand constructor.
     *
     * @param \DesignPattern\Behavioral\Command\Computer $computer
     */
    public function __construct(Computer $computer)
    {
        $this->computer = $computer;
    }

    /**
     * @return void
     */
    public function execute(): void
    {
        $this->computer->startup();
    }
}
