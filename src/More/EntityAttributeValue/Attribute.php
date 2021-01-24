<?php

declare(strict_types=1);

namespace DesignPattern\More\EntityAttributeValue;

class Attribute
{
    /**
     * @var \SplObjectStorage
     */
    private \SplObjectStorage $storage;

    /**
     * @var string
     */
    private string $name;

    /**
     * Attribute constructor.
     *
     * @param  string  $name
     */
    public function __construct(string $name)
    {
        $this->storage = new \SplObjectStorage();
        $this->name = $name;
    }

    /**
     * @param  \DesignPattern\More\EntityAttributeValue\Value  $value
     *
     * @return void
     */
    public function addValue(Value $value): void
    {
        $this->storage->attach($value);
    }

    /**
     * @return \SplObjectStorage
     */
    public function getValue(): \SplObjectStorage
    {
        return $this->storage;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
