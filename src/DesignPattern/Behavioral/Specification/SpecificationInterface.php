<?php

namespace DesignPattern\Behavioral\Specification;

interface SpecificationInterface
{
    /**
     * @param Item $item
     *
     * @return bool
     */
    public function isSatisfiedBy(Item $item): bool;
}
