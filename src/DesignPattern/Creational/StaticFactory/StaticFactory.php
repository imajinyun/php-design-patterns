<?php

namespace DesignPattern\Creational\StaticFactory;

final class StaticFactory
{
    /**
     * Create a static factory class.
     *
     * @param string $type
     *
     * @return \DesignPattern\Creational\StaticFactory\FormatterInterface
     * @throws \InvalidArgumentException
     */
    public static function factory(string $type) : FormatterInterface
    {
        $class = __NAMESPACE__ . '\Formatter' . ucfirst($type);

        if (!class_exists($class)) {
            throw new \InvalidArgumentException("$class is not found.");
        }

        return new $class();
    }
}
