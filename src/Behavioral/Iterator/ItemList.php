<?php

namespace DesignPattern\Behavioral\Iterator;

class ItemList implements \Countable
{
    /**
     * @var array|\DesignPattern\Behavioral\Iterator\Item[]
     */
    private array $list;

    /**
     * ItemList constructor.
     */
    public function __construct()
    {
        $this->list = [];
    }

    /**
     * @return array|\DesignPattern\Behavioral\Iterator\Item[]
     */
    public function getItems(): array
    {
        return $this->list;
    }

    /**
     * Get item by id.
     *
     * @param int $id
     *
     * @return \DesignPattern\Behavioral\Iterator\Item|null
     */
    public function getItem(int $id): ?Item
    {
        if ($id < $this->count()) {
            return $this->list[$id];
        }

        return null;
    }

    /**
     * @param \DesignPattern\Behavioral\Iterator\Item $item
     */
    public function addItem(Item $item): void
    {
        if (! in_array($item, $this->list, true)) {
            $this->list[] = $item;
        }
    }

    /**
     * @param \DesignPattern\Behavioral\Iterator\Item $item
     */
    public function deleteItem(Item $item): void
    {
        $id = array_search($item, $this->list, true);

        if ($id !== false) {
            unset($this->list[$id]);
        }
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->list);
    }
}
