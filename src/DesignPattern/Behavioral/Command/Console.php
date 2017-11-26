<?php

namespace DesignPattern\Behavioral\Command;

class Console
{
    /**
     * @var \DesignPattern\Behavioral\Command\CommandInterface
     */
    private $command;

    /**
     * Console constructor.
     *
     * @param \DesignPattern\Behavioral\Command\CommandInterface $command
     */
    public function __construct(CommandInterface $command)
    {
        $this->command = $command;
    }

    /**
     * Get command.
     *
     * @return \DesignPattern\Behavioral\Command\CommandInterface
     */
    public function getCommand() : CommandInterface
    {
        return $this->command;
    }

    /**
     * Set command.
     *
     * @param \DesignPattern\Behavioral\Command\CommandInterface $command
     */
    public function setCommand(CommandInterface $command)
    {
        $this->command = $command;
    }

    /**
     * Command execute.
     */
    public function invoke()
    {
        $this->command->execute();
    }
}
