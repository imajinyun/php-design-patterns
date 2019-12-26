<?php

namespace DesignPattern\Behavioral\Command;

class Console
{
    /**
     * @var \DesignPattern\Behavioral\Command\CommandInterface
     */
    private CommandInterface $command;

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
    public function getCommand(): CommandInterface
    {
        return $this->command;
    }

    /**
     * Set command.
     *
     * @param \DesignPattern\Behavioral\Command\CommandInterface $command
     *
     * @return void
     */
    public function setCommand(CommandInterface $command): void
    {
        $this->command = $command;
    }

    /**
     * Command execute.
     *
     * @return void
     */
    public function invoke(): void
    {
        $this->command->execute();
    }
}
