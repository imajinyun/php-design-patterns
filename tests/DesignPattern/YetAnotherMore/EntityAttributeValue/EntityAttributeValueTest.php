<?php

namespace DesignPattern\Test\YetAnotherMore\EntityAttributeValue;

use DesignPattern\YetAnotherMore\EntityAttributeValue\Attribute;
use DesignPattern\YetAnotherMore\EntityAttributeValue\Entity;
use DesignPattern\YetAnotherMore\EntityAttributeValue\Value;
use PHPUnit\Framework\TestCase;

class EntityAttributeValueTest extends TestCase
{
    public function testAttribute()
    {
        $attribute = new Attribute('attribute');

        self::assertInstanceOf(\SplObjectStorage::class, $attribute->getValue());
    }

    public function testValue()
    {
        $value = new Value(new Attribute('attribute'), 'value');
        $expect = 'attribute: value';

        self::assertEquals($expect, (string)$value);
    }

    public function testAddAttributeToEntity()
    {
        $colorAttribute = new Attribute('color');
        $colorWhite = new Value($colorAttribute, 'white');
        $colorBlack = new Value($colorAttribute, 'black');

        $memory = new Value(new Attribute('memory'), '6GB');
        $entity = new Entity('MI 6 Phone', [$colorWhite, $colorBlack, $memory]);

        $expect = 'MI 6 Phone, color: white, color: black, memory: 6GB';
        self::assertEquals($expect, (string)$entity);
    }
}
