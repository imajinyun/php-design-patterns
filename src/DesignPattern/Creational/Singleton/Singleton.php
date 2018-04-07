<?php

namespace DesignPattern\Creational\Singleton;

final class Singleton
{
    /**
     * Singleton reference to singleton instance.
     *
     * @var Singleton
     */
    private static $instance;

    /**
     * Get the instance via lazy initialization (created on first usage).
     *
     * A new instance is created via late static binding
     * in the static creation method getInstance()
     * with the keyword static.
     * This allows the subclassing of the class Singleton in the example.
     *
     * @return \DesignPattern\Creational\Singleton\Singleton
     */
    public static function getInstance(): Singleton
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Singleton constructor.
     *
     * The constructor __construct() is declared as private
     * to prevent creating a new instance outside of the class via
     * the new operator.
     */
    private function __construct()
    {
    }

    /**
     * Singleton clone.
     *
     * The magic method __clone() is declared as private
     * to prevent cloning of an instance of the class via
     * the clone operator.
     */
    private function __clone()
    {
    }

    /**
     * Singleton wakeup.
     *
     * The magic method __wakeup() is declared as private
     * to prevent unserializing of an instance of the class via
     * the global function unserialize().
     */
    private function __wakeup()
    {
    }

    /**
     * Singleton sleep.
     *
     * The magic method __sleep() is declared as private
     * to prevent unserializing of an instance of the class via
     * the global function serialize().
     */
    private function __sleep()
    {
    }
}
