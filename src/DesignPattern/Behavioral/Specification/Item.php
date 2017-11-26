<?php

namespace DesignPattern\Behavioral\Specification;

class Item
{
    /**
     * @var int
     */
    private $value;

    /**
     * Item constructor.
     *
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue() : int
    {
        return $this->value;
    }
}
