<?php

namespace DesignPattern\Behavioral\Interpreter;

class Variable implements ExpressionInterface
{
    /**
     * @var string
     */
    private string $name;

    /**
     * Variable constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param array $context
     *
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    public function interpret(array $context)
    {
        if (isset($context[$this->name])) {
            return $context[$this->name]->interpret($context);
        }

        throw new \InvalidArgumentException('Parameter must be a legal variable.');
    }
}
