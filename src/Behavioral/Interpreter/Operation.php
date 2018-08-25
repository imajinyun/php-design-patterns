<?php

namespace DesignPattern\Behavioral\Interpreter;

class Operation implements ExpressionInterface
{
    /**
     * @var \DesignPattern\Behavioral\Interpreter\ExpressionInterface
     */
    private $left;

    /**
     * @var \DesignPattern\Behavioral\Interpreter\ExpressionInterface
     */
    private $right;

    /**
     * @var string
     */
    private $operator;

    /**
     * Operation constructor.
     *
     * @param \DesignPattern\Behavioral\Interpreter\ExpressionInterface $left
     * @param \DesignPattern\Behavioral\Interpreter\ExpressionInterface $right
     * @param string                                                    $operator
     */
    public function __construct(
        ExpressionInterface $left,
        ExpressionInterface $right,
        string $operator = ''
    ) {
        $this->left = $left;
        $this->right = $right;
        $this->operator = $operator;
    }

    /**
     * @param array $context
     *
     * @return float|int|mixed|string
     */
    public function interpret(array $context)
    {
        $left = $this->left->interpret($context);
        $right = $this->right->interpret($context);

        switch ($this->operator) {
            case '-':
                return $left - $right;
            case '*':
                return $left * $right;
            case '/':
                return $left / $right;
            default:
                return $left + $right;
        }
    }
}
