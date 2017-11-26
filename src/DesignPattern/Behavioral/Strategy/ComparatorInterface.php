<?php

namespace DesignPattern\Behavioral\Strategy;

interface ComparatorInterface
{
    /**
     * Compare the two given values.
     *
     * @param mixed $left
     * @param mixed $right
     *
     * @return int
     */
    public function compare($left, $right) : int;
}
