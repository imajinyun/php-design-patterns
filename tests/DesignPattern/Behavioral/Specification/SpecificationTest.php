<?php

namespace DesignPattern\Test\Behavioral\Specification;

use DesignPattern\Behavioral\Specification\AndSpecification;
use DesignPattern\Behavioral\Specification\Item;
use DesignPattern\Behavioral\Specification\LogicalSpecification;
use DesignPattern\Behavioral\Specification\NotSpecification;
use DesignPattern\Behavioral\Specification\OrSpecification;
use DesignPattern\Behavioral\Specification\RangeSpecification;
use PHPUnit\Framework\TestCase;

/**
 * Class SpecificationTest
 *
 * @package DesignPattern\Test\Behavioral\Specification
 */
class SpecificationTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidArgumentException()
    {
        $range = new RangeSpecification(1, 100);
        new LogicalSpecification('test', $range);
    }

    public function testOr()
    {
        $range1 = new RangeSpecification(1, 99);
        $range2 = new RangeSpecification(101, 199);

        $logical = new LogicalSpecification('or', $range1, $range2);
        self::assertFalse($logical->isSatisfiedBy(new Item(100)));
        self::assertTrue($logical->isSatisfiedBy(new Item(50)));
        self::assertTrue($logical->isSatisfiedBy(new Item(150)));
    }

    public function testAnd()
    {
        $range1 = new RangeSpecification(50, 100);
        $range2 = new RangeSpecification(80, 100);

        $logical = new LogicalSpecification('and', $range1, $range2);
        self::assertFalse($logical->isSatisfiedBy(new Item(101)));
        self::assertFalse($logical->isSatisfiedBy(new Item(1)));
        self::assertFalse($logical->isSatisfiedBy(new Item(55)));
        self::assertTrue($logical->isSatisfiedBy(new Item(81)));
        self::assertTrue($logical->isSatisfiedBy(new Item(99)));
    }

    public function testNot()
    {
        $range = new RangeSpecification(1, 100);

        $logical = new LogicalSpecification('not', $range);
        self::assertFalse($logical->isSatisfiedBy(new Item(50)));
        self::assertTrue($logical->isSatisfiedBy(new Item(101)));
    }
}
