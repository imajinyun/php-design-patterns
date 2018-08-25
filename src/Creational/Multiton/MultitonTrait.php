<?php

namespace DesignPattern\Creational\Multiton;

trait MultitonTrait
{
    /**
     * @var array MultitonTrait[]
     */
    public static $instances = [];

    /**
     * Get multiton instance.
     *
     * @param string $identifier
     *
     * @return \DesignPattern\Creational\Multiton\Multiton
     *
     * @throws \ReflectionException
     */
    public static function getInstance(string $identifier): Multiton
    {
        $class = static::class;
        $parameter = \array_slice(\func_get_args(), 1);

        if (! isset(static::$instances[$identifier])) {
            $reflection = new \ReflectionClass($class);
            $constructor = $reflection->getConstructor();
            $object = $reflection->newInstanceWithoutConstructor();

            if ($constructor !== null) {
                $constructor->setAccessible(true);
                $constructor->invokeArgs($object, $parameter);
            }

            static::$instances[$identifier] = $object;
        }

        return static::$instances[$identifier];
    }

    /**
     * Set multiton instance.
     *
     * @param string                                      $identifier
     * @param \DesignPattern\Creational\Multiton\Multiton $instance
     *
     * @return void
     */
    public static function setInstance(
        string $identifier,
        Multiton $instance
    ): void {
        static::$instances[$identifier] = $instance;
    }

    /**
     * Prevent instance from being cloned.
     *
     * @throws \RuntimeException
     */
    private function __clone()
    {
        throw new \RuntimeException('Unable to clone a multiton object.');
    }

    /**
     * Prevent install from being unserialized.
     *
     * @throws \RuntimeException
     */
    private function __wakeup()
    {
        throw new \RuntimeException('Unable to unserialize a multiton object.');
    }
}
