<?php

declare(strict_types=1);

namespace DesignPattern\Test\Creational\Singleton;

use DesignPattern\Creational\Singleton\Singleton;
use PHPUnit\Framework\TestCase;

class SingletonTest extends TestCase
{
    /**
     * Test uniqueness.
     */
    public function testUniqueness(): void
    {
        $expected = Singleton::class;

        $firstCall = Singleton::getInstance();
        $this->assertNotNull($firstCall);
        $this->assertInstanceOf($expected, $firstCall);

        $secondCall = Singleton::getInstance();
        $this->assertNotNull($secondCall);
        $this->assertInstanceOf($expected, $secondCall);
    }

    /**
     * Test constructor, clone, wakeup, sleep method is private.
     *
     * @throws \ReflectionException
     */
    public function testPrivateMethods(): void
    {
        $object = Singleton::getInstance();
        $this->assertNotNull($object);

        $reflection = new \ReflectionClass($object);
        $methods = $reflection->getMethods(\ReflectionMethod::IS_PRIVATE);
        foreach ($methods as $key => $method) {
            self::assertTrue($method->isPrivate());
            $method->setAccessible(true);
            self::assertEquals(null, $method->invokeArgs($object, []));
        }
    }
}
