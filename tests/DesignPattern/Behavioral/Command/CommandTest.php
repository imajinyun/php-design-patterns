<?php

namespace DesignPattern\Test\Behavioral\Command;

use DesignPattern\Behavioral\Command\Computer;
use DesignPattern\Behavioral\Command\Console;
use DesignPattern\Behavioral\Command\ShutdownCommand;
use DesignPattern\Behavioral\Command\StartupCommand;
use PHPUnit\Framework\TestCase;

class CommandTest extends TestCase
{
    private $computer;

    protected function setUp()
    {
        $this->computer = new Computer();
    }

    public function testGetSetCommand(): void
    {
        $console = new Console(new StartupCommand($this->computer));
        $command = $console->getCommand();
        self::assertEquals(StartupCommand::class, \get_class($command));

        $console->setCommand(new ShutdownCommand($this->computer));
        $command = $console->getCommand();
        self::assertEquals(ShutdownCommand::class, \get_class($command));
    }

    public function testStartupCommand(): void
    {
        $console = new Console(new StartupCommand($this->computer));

        $this->expectOutputString('System is starting up...');
        $console->invoke();
    }

    public function testShutdownCommand(): void
    {
        $console = new Console(new ShutdownCommand($this->computer));

        $this->expectOutputString('System is shutting down...');
        $console->invoke();
    }
}
