<?php

namespace DesignPattern\Test\Creational\Pool;

use DesignPattern\Creational\Pool\Pool;
use PHPUnit\Framework\TestCase;

class PoolTest extends TestCase
{
    public function testCanGetNewInstancesWithGet()
    {
        $pool = new Pool();
        $worker1 = $pool->get();
        $worker2 = $pool->get();

        self::assertCount(2, $pool);
        self::assertNotSame($worker1, $worker2);
    }

    public function testCanGetSameInstanceTwiceWhenDisposingItFirst()
    {
        $pool = new Pool();
        $worker1 = $pool->get();
        $pool->dispose($worker1);
        $worker2 = $pool->get();

        self::assertCount(1, $pool);
        self::assertSame($worker1, $worker2);
    }
}
