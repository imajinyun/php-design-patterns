<?php

namespace DesignPattern\Test\Structural\Registry;

use DesignPattern\Structural\Registry\Registry;
use PHPUnit\Framework\TestCase;

class RegistryTest extends TestCase
{
    public function testSetAndGetLogger()
    {
        $key = Registry::LOGGER;
        $object = new \stdClass();

        Registry::set($key, $object);
        $actual = Registry::get($key);

        self::assertInstanceOf('stdClass', $actual);
        self::assertEquals($object, $actual);
    }
}
