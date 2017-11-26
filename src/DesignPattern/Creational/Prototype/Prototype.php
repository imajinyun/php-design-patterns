<?php

namespace DesignPattern\Creational\Prototype;

abstract class Prototype
{
    /**
     * @var string
     */
    protected $key;

    /**
     * @var string
     */
    protected $category;

    /**
     * @return mixed
     */
    abstract public function __clone();

    /**
     * Get key.
     *
     * @return string
     */
    public function getKey() : string
    {
        return $this->key;
    }

    /**
     * Set key.
     *
     * @param string $key
     */
    public function setKey(string $key)
    {
        $this->key = $key;
    }
}
