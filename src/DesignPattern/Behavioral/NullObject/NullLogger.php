<?php

namespace DesignPattern\Behavioral\NullObject;

class NullLogger implements LoggerInterface
{
    public function log(string $string)
    {
        unset($string);
    }
}
