<?php

namespace DesignPattern\Behavioral\NullObject;

interface LoggerInterface
{
    /**
     * Record log.
     *
     * @param string $string
     *
     * @return mixed
     */
    public function log(string $string);
}
