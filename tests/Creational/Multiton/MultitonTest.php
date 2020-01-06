<?php

declare(strict_types=1);

namespace DesignPattern\Test\Creational\Multiton;

use DesignPattern\Creational\Multiton\Multiton;
use PHPUnit\Framework\TestCase;

class MultitonTest extends TestCase
{
    /**
     * @throws \ReflectionException
     */
    public function testMultitonInstance(): void
    {
        $firstInstance = Multiton::getInstance('a', 'hello');
        $secondInstance = Multiton::getInstance('a', 'world');

        self::assertEquals($firstInstance, $secondInstance);
        self::assertEquals('hello', $firstInstance->value);
        self::assertEquals('hello', $secondInstance->value);

        $thirdInstance = Multiton::getInstance('b', 'english');
        $fourthInstance = Multiton::getInstance('b', 'chinese');
        Multiton::setInstance('c', $fourthInstance);

        self::assertEquals($thirdInstance, $fourthInstance);
        self::assertEquals('english', $thirdInstance->value);
        self::assertEquals('english', $fourthInstance->value);
        self::assertEquals('english', Multiton::getInstance('c')->value);
    }

    /**
     * @throws \ReflectionException
     */
    public function testPrivateMethods(): void
    {
        $object = Multiton::getInstance('multiton', 'hello world');
        $reflection = new \ReflectionClass($object);
        $methods = $reflection->getMethods(\ReflectionMethod::IS_PRIVATE);
        foreach ($methods as $key => $method) {
            self::assertTrue($method->isPrivate());
        }
    }
}
