<?php

namespace DesignPattern\Creational\Prototype;

abstract class Prototype
{
    /**
     * @return mixed
     */
    abstract public function __clone();

    /**
     * @param string $property
     *
     * @return bool
     */
    public function __isset(string $property)
    {
        return isset($this->{$property});
    }

    /**
     * @param string $property
     * @param mixed $value
     */
    public function __set(string $property, $value)
    {
        $this->{$property} = $value;
    }

    /**
     * @param string $property
     *
     * @return null
     */
    public function __get(string $property)
    {
        if (property_exists($this, $property)) {
            return $this->{$property};
        }

        return null;
    }
}
