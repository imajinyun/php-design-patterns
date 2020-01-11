<?php

declare(strict_types=1);

namespace DesignPattern\Structural\Facade;

interface MacOSInterface
{
    public function restart();

    public function shutdown();

    public function launch();

    /**
     * Get name.
     *
     * @return string
     */
    public function getName(): string;
}
