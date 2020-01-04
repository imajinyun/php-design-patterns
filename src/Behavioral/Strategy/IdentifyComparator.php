<?php

declare(strict_types=1);

namespace DesignPattern\Behavioral\Strategy;

class IdentifyComparator implements ComparatorInterface
{
    /**
     * Compare the two given id values.
     *
     * @param mixed $left
     * @param mixed $right
     *
     * @return int
     */
    public function compare($left, $right): int
    {
        return $left['id'] <=> $right['id'];
    }
}
