<?php

namespace DesignPattern\Test\YetAnotherMore\Delegation;

use DesignPattern\YetAnotherMore\Delegation\Component;
use DesignPattern\YetAnotherMore\Delegation\Controller;
use PHPUnit\Framework\TestCase;

class DelegationTest extends TestCase
{
    /**
     * @var \DesignPattern\YetAnotherMore\Delegation\Controller
     */
    private $controller;

    protected function setUp()
    {
        $this->controller = new Controller(new Component());
    }

    public function testStringToArray()
    {
        $expected = '1,2,3,4,5,';
        $actual = $this->controller->toArray($expected);
        $actual = array_filter($actual);
        self::assertEquals([1, 2, 3, 4, 5], $actual);
    }
}
