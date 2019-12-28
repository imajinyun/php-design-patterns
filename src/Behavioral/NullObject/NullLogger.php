<?php
declare(strict_types=1);

namespace DesignPattern\Behavioral\NullObject;

class NullLogger implements LoggerInterface
{
    public function log(string $string)
    {
    }
}
