<?php

declare(strict_types=1);

namespace DesignPattern\More\Delegation;

class Controller
{
    /**
     * @var \DesignPattern\More\Delegation\Component
     */
    private Component $component;

    /**
     * Controller constructor.
     *
     * @param  \DesignPattern\More\Delegation\Component  $component
     */
    public function __construct(Component $component)
    {
        $this->component = $component;
    }

    /**
     * Convert string to array.
     *
     * @param  string  $string
     *
     * @return array
     */
    public function toArray(string $string): array
    {
        return $this->component->stringToArray($string);
    }
}
