<?php

namespace DesignPattern\Test\Creational\Prototype;

use DesignPattern\Creational\Prototype\BarPrototype;
use DesignPattern\Creational\Prototype\FooPrototype;
use PHPUnit\Framework\TestCase;

class PrototypeTest extends TestCase
{
    public function testCanGetBarAndFoo()
    {
        $barPrototype = new BarPrototype();
        $fooPrototype = new FooPrototype();

        for ($i = 0; $i < 10; $i++) {
            $bar = clone $barPrototype;
            $bar->setKey('Bar No ' . ($i + 1));
            self::assertInstanceOf(BarPrototype::class, $bar);
        }

        for ($j = 0; $j < 10; $j++) {
            $key = 'Foo NO ' . ($j + 1);
            $foo = clone $fooPrototype;
            $foo->setKey($key);
            self::assertInstanceOf(FooPrototype::class, $foo);
            self::assertEquals($key, $foo->getKey());
        }
    }
}
