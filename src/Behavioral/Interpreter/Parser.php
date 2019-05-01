<?php

namespace DesignPattern\Behavioral\Interpreter;

class Parser
{
    /**
     * @var mixed
     */
    private $expression;

    /**
     * Parser constructor.
     *
     * @param string $expression
     */
    public function __construct(string $expression)
    {
        $stack = $this->toDecompose($expression);
        $this->expression = array_pop($stack);
    }

    /**
     * @param array $context
     *
     * @return mixed
     */
    public function interpret(array $context)
    {
        return $this->expression->interpret($context);
    }

    /**
     * Decompose expression.
     *
     * @param string $expression
     *
     * @return array
     */
    private function toDecompose(string $expression): array
    {
        $stack = [];
        foreach (explode(' ', $expression) as $item) {
            switch ($item) {
                case '+': // Plus.
                case '-': // Minus.
                case '*': // Multiply.
                case '/': // Divide.
                    $stack[] = $this->arithmetic($stack, $item);
                    break;
                case is_numeric($item): // Number
                    $stack[] = new Number($item);
                    break;
                default: // Variable.
                    $stack[] = new Variable($item);
                    break;
            }
        }

        return $stack;
    }

    /**
     * @param array $array
     * @param string $item
     *
     * @return \DesignPattern\Behavioral\Interpreter\Operation
     */
    private function arithmetic(array $array, string $item): Operation
    {
        $right = array_pop($array);
        $left = array_pop($array);

        return new Operation($left, $right, $item);
    }
}
