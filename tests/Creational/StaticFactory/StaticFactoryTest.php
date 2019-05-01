<?php

namespace DesignPattern\Test\Creational\StaticFactory;

use DesignPattern\Creational\StaticFactory\FormatterNumber;
use DesignPattern\Creational\StaticFactory\FormatterString;
use DesignPattern\Creational\StaticFactory\StaticFactory;
use PHPUnit\Framework\TestCase;

class StaticFactoryTest extends TestCase
{
    public function testFormatterInstance(): void
    {
        $stringObject = StaticFactory::factory('string');
        self::assertInstanceOf(FormatterString::class, $stringObject);

        $numberObject = StaticFactory::factory('number');
        self::assertInstanceOf(FormatterNumber::class, $numberObject);
    }

    public function testFormatterOutput(): void
    {
        $expect = ['Hello World!', '1000'];
        $actual = [
            StaticFactory::factory('string')->format(' Hello World! '),
            StaticFactory::factory('number')->format('1000'),
        ];
        self::assertEquals($expect, $actual);
    }

    public function testException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        StaticFactory::factory('test');
    }
}
