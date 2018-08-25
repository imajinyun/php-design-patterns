<?php

namespace DesignPattern\More\Delegation;

class Component
{
    /**
     * String to array.
     *
     * @param $string
     *
     * @return array
     */
    public function stringToArray(string $string): array
    {
        $array = explode(',', $string);

        return array_filter($array);
    }
}
