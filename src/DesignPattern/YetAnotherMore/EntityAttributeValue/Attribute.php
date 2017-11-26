<?php

namespace DesignPattern\YetAnotherMore\EntityAttributeValue;

class Attribute
{
    /**
     * @var \SplObjectStorage
     */
    private $storage;

    /**
     * @var string
     */
    private $name;

    /**
     * Attribute constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->storage = new \SplObjectStorage();
        $this->name = $name;
    }

    /**
     * @param \DesignPattern\YetAnotherMore\EntityAttributeValue\Value $value
     */
    public function addValue(Value $value)
    {
        $this->storage->attach($value);
    }

    /**
     * @return \SplObjectStorage
     */
    public function getValue() : \SplObjectStorage
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
