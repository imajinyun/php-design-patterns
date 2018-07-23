<?php

namespace DesignPattern\Structural\Registry;

abstract class Registry
{
    public const LOGGER = 'logger';

    /**
     * @var array
     */
    protected static $collection = [];

    /**
     * Gets a value from the registry.
     *
     * @param string $key
     *
     * @return mixed
     */
    public static function get(string $key)
    {
        return self::$collection[$key];
    }

    /**
     * Sets a value.
     *
     * @param string $key
     * @param mixed $val
     *
     * @return void
     */
    public static function set(string $key, $val): void
    {
        self::$collection[$key] = $val;
    }
}
