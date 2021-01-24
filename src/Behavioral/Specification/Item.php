<?php

declare(strict_types=1);

namespace DesignPattern\Behavioral\Specification;

class Item
{
    /**
     * @var int
     */
    private int $value;

    /**
     * Item constructor.
     *
     * @param  int  $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}
