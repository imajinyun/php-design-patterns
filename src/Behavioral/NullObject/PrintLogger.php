<?php

declare(strict_types=1);

namespace DesignPattern\Behavioral\NullObject;

class PrintLogger implements LoggerInterface
{
    public function log(string $string)
    {
        echo $string;
    }
}
