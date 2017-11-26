<?php

namespace DesignPattern\Test\Behavioral\Interpreter;

use DesignPattern\Behavioral\Interpreter\Number;
use DesignPattern\Behavioral\Interpreter\Parser;
use PHPUnit\Framework\TestCase;

/**
 * Interpreter Test.
 *
 * @package DesignPattern\Test\Behavioral\Interpreter
 */
class InterpreterTest extends TestCase
{
    public function testInterpreterWithContext()
    {
        $firstContext = [
            'x' => new Number(100),
            'y' => new Number(200),
        ];
        $actual = (new Parser('5 x * y + 100 - 2 /'))->interpret($firstContext);
        self::assertSame(300, $actual);

        $secondContext = [];
        $expression = '';
        for ($i = 1; $i <= 100; $i++) {
            $secondContext[$i] = new Number($i);
            if ($i >= 2) {
                $expression .= " $i +";
            } else {
                $expression .= "$i";
            }
        }
        self::assertSame(5050, (new Parser($expression))->interpret($secondContext));
    }

    public function testInterpreterWithEmptyContext()
    {
        self::assertSame(10, (new Parser('1 1 + 8 +'))->interpret([]));
        self::assertSame(100, (new Parser('2 2 * 6 + 10 *'))->interpret([]));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testException()
    {
        $num = ['num' => new Number(100)];
        (new Parser('5 test *'))->interpret($num);
    }
}
