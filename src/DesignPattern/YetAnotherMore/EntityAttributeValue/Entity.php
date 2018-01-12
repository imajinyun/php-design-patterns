<?php

namespace DesignPattern\YetAnotherMore\EntityAttributeValue;

class Entity
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
     * Entity constructor.
     *
     * @param string $name
     * @param array  $value
     */
    public function __construct(string $name, array $value)
    {
        $this->name = $name;
        $this->storage = new \SplObjectStorage();

        foreach ($value as $item) {
            $this->storage->attach($item);
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $array = [$this->name];

        foreach ($this->storage as $item) {
            $array[] = $item;
        }

        return implode(', ', $array);
    }
}
