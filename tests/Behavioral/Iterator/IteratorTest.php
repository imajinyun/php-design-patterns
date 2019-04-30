<?php

namespace DesignPattern\Test\Behavioral\Iterator;

use DesignPattern\Behavioral\Iterator\Item;
use DesignPattern\Behavioral\Iterator\ItemIterator;
use DesignPattern\Behavioral\Iterator\ItemList;
use PHPUnit\Framework\TestCase;

class IteratorTest extends TestCase
{
    public function testItemKeyValue(): void
    {
        $list = new ItemList();
        $list->addItem(new Item(1001, 'Item 1001'));
        $list->addItem(new Item(1002, 'Item 1002'));

        self::assertEquals(1001, $list->getItems()[0]->getId());
        self::assertEquals('Item 1001', $list->getItems()[0]->getName());
        self::assertCount(2, $list->getItems());

        $item = new Item(1003, 'Item 1003');
        $list->addItem($item);
        $list->deleteItem($item);
        self::assertCount(2, $list->getItems());
    }

    public function testItemList(): void
    {
        $list = new ItemList();
        $list->addItem(new Item(1, 'a'));
        $list->addItem(new Item(2, 'b'));
        $list->addItem(new Item(3, 'c'));
        $list->addItem(new Item(4, 'd'));

        $items = [];
        foreach ($list->getItems() as $item) {
            /** @var $item Item */
            $items[] = $item->__toString();
        }
        $expected = ['1 - a', '2 - b', '3 - c', '4 - d'];
        self::assertEquals($expected, $items);
    }

    public function testItemIterator(): void
    {
        $array = ['1 - a', '2 - b', '3 - c'];
        $list = new ItemList();
        $list->addItem(new Item(1, 'a'));
        $list->addItem(new Item(2, 'b'));
        $list->addItem(new Item(3, 'c'));
        $iterator = new ItemIterator($list);
        while ($iterator->valid()) {
            self::assertSame(
                $array[$iterator->key()],
                $iterator->current()->__toString()
            );
            $iterator->next();
        }
        self::assertEquals(3, $iterator->key());
        $iterator->rewind();
        self::assertEquals(0, $iterator->key());
    }
}
