<?php

declare(strict_types=1);

namespace DesignPattern\Behavioral\Specification;

class RangeSpecification extends AbstractSpecification
{
    /**
     * @var int|null
     */
    private ?int $min;

    /**
     * @var int|null
     */
    private ?int $max;

    /**
     * RangeSpecification constructor.
     *
     * @param  int  $min
     * @param  int  $max
     */
    public function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * @param  \DesignPattern\Behavioral\Specification\Item  $item
     *
     * @return bool
     */
    public function isSatisfiedBy(Item $item): bool
    {
        $value = $item->getValue();
        if ($this->max !== null && $value > $this->max) {
            return false;
        }

        if ($this->min !== null && $value < $this->min) {
            return false;
        }

        return true;
    }
}
