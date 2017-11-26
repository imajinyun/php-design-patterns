<?php

namespace DesignPattern\YetAnotherMore\Delegation;

class Controller
{
    /**
     * @var \DesignPattern\YetAnotherMore\Delegation\Component|null
     */
    private $component = null;

    /**
     * Controller constructor.
     *
     * @param \DesignPattern\YetAnotherMore\Delegation\Component $component
     */
    public function __construct(Component $component)
    {
        $this->component = $component;
    }

    /**
     * Convert string to array.
     *
     * @param string $string
     *
     * @return array
     */
    public function toArray(string $string) : array
    {
        return $this->component->stringToArray($string);
    }
}
