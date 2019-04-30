<?php

namespace DesignPattern\Test\Behavioral\Interpreter;

use DesignPattern\Behavioral\Interpreter\Number;
use DesignPattern\Behavioral\Interpreter\Parser;
use PHPUnit\Framework\TestCase;

class InterpreterTest extends TestCase
{
    public function testInterpreterWithContext(): void
    {
        $firstContext = [
            'x' => new Number(100),
            'y' => new Number(200),
        ];
        $expression = '5 x * y + 100 - 2 /';
        $actual = (new Parser($expression))->interpret($firstContext);
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
        self::assertSame(
            5050,
            (new Parser($expression))->interpret($secondContext)
        );
    }

    public function testInterpreterWithEmptyContext(): void
    {
        self::assertSame(10, (new Parser('1 1 + 8 +'))->interpret([]));
        self::assertSame(100, (new Parser('2 2 * 6 + 10 *'))->interpret([]));
    }

    public function testException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $num = ['num' => new Number(100)];
        (new Parser('5 test *'))->interpret($num);
    }
}
