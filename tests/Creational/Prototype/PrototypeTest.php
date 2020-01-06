<?php

declare(strict_types=1);

namespace DesignPattern\Test\Creational\Prototype;

use DesignPattern\Creational\Prototype\BarPrototype;
use DesignPattern\Creational\Prototype\FooPrototype;
use PHPUnit\Framework\TestCase;

class PrototypeTest extends TestCase
{
    public function testClassProperty(): void
    {
        $barPrototype = new BarPrototype();
        $fooPrototype = new FooPrototype();

        for ($i = 0; $i < 10; $i++) {
            $bar = clone $barPrototype;
            $property = 'barProperty' . $i;
            self::assertEquals(false, $bar->{$property});
            $bar->{$property} = $i;
            self::assertInstanceOf(BarPrototype::class, $bar);
            self::assertEquals($bar->{$property}, $i);
        }

        for ($j = 0; $j < 10; $j++) {
            $foo = clone $fooPrototype;
            $property = 'fooProperty' . $j;
            self::assertEquals(false, $foo->{$property});
            $foo->{$property} = $j;
            self::assertInstanceOf(FooPrototype::class, $foo);
            self::assertEquals($foo->{$property}, $j);
        }
    }
}
