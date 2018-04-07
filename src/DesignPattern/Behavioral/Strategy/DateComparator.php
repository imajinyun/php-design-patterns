<?php

namespace DesignPattern\Behavioral\Strategy;

class DateComparator implements ComparatorInterface
{
    /**
     * Compare the two given date values.
     *
     * @param mixed $left
     * @param mixed $right
     *
     * @return int
     */
    public function compare($left, $right): int
    {
        $left = new \DateTime($left['date']);
        $right = new \DateTime($right['date']);

        return $left <=> $right;
    }
}
