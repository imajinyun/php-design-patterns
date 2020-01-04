<?php

declare(strict_types=1);

namespace DesignPattern\Behavioral\Strategy;

class Collection
{
    /**
     * @var array
     */
    private array $elements;

    /**
     * @var \DesignPattern\Behavioral\Strategy\ComparatorInterface
     */
    private ComparatorInterface $comparator;

    /**
     * Collection constructor.
     *
     * @param array $elements
     */
    public function __construct(array $elements = [])
    {
        $this->elements = $elements;
    }

    /**
     * Sort method.
     *
     * @return array
     * @throws \LogicException
     */
    public function sort(): array
    {
        if (! $this->comparator) {
            throw new \LogicException('Comparator is not set.');
        }

        uasort($this->elements, [$this->comparator, 'compare']);

        return $this->elements;
    }

    /**
     * @param \DesignPattern\Behavioral\Strategy\ComparatorInterface $comparator
     *
     * @return void
     */
    public function setComparator(ComparatorInterface $comparator): void
    {
        $this->comparator = $comparator;
    }
}
