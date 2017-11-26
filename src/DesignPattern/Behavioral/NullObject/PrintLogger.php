<?php

namespace DesignPattern\Behavioral\NullObject;

class PrintLogger implements LoggerInterface
{
    public function log(string $string)
    {
        echo $string;
    }
}
