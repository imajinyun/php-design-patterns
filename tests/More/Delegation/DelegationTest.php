<?php

declare(strict_types=1);

namespace DesignPattern\Test\More\Delegation;

use DesignPattern\More\Delegation\Component;
use DesignPattern\More\Delegation\Controller;
use PHPUnit\Framework\TestCase;

class DelegationTest extends TestCase
{
    /**
     * @var \DesignPattern\More\Delegation\Controller
     */
    private Controller $controller;

    protected function setUp(): void
    {
        $this->controller = new Controller(new Component());
    }

    public function testStringToArray(): void
    {
        $expected = '1,2,3,4,5,';
        $actual = $this->controller->toArray($expected);
        $actual = array_filter($actual);
        self::assertEquals([1, 2, 3, 4, 5], $actual);
    }
}
