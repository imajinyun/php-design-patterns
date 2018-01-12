<?php

namespace DesignPattern\Structural\Facade;

/**
 * Class MacOS.
 *
 * @package DesignPattern\Structural\Facade
 */
class MacOS implements MacOSInterface
{
    /**
     * @var string
     */
    private $name;

    public function restart() : bool
    {
        return $this->execute('restart');
    }

    public function shutdown() : bool
    {
        return $this->execute('shutdown');
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function launch() : string
    {
        return 'The operating system is starting...';
    }

    /**
     * Executive operation.
     *
     * @param string $command
     *
     * @return mixed
     */
    protected function execute($command)
    {
        if (\in_array($command, ['restart', 'shutdown'], true)) {
            return sprintf('The system is executing the %s command...',
                $command);
        }

        return false;
    }
}
