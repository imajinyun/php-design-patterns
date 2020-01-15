<?php

declare(strict_types=1);

namespace DesignPattern\Behavioral\Iterator;

class ItemIterator implements \Iterator
{
    /**
     * @var \DesignPattern\Behavioral\Iterator\ItemList
     */
    private ItemList $list;

    /**
     * @var int
     */
    private int $index;

    /**
     * ItemIterator constructor.
     *
     * @param \DesignPattern\Behavioral\Iterator\ItemList $list
     */
    public function __construct(ItemList $list)
    {
        $this->list = $list;
        $this->index = 0;
    }

    /**
     * Return the current Item.
     *
     * @return \DesignPattern\Behavioral\Iterator\Item
     */
    public function current(): Item
    {
        return $this->list->getItem($this->index);
    }

    /**
     * Return the key of the current Item.
     *
     * @return int
     */
    public function key(): int
    {
        return $this->index;
    }

    /**
     * Move forward to next Item.
     *
     * @return int
     */
    public function next(): int
    {
        return $this->index++;
    }

    /**
     * Rewind the Iterator to the first Item.
     *
     * @return int
     */
    public function rewind(): int
    {
        return $this->index = 0;
    }

    /**
     * Check if current position is valid.
     *
     * @return bool
     */
    public function valid(): bool
    {
        return null !== $this->list->getItem($this->index);
    }
}
