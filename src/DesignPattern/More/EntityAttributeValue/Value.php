<?php

namespace DesignPattern\More\EntityAttributeValue;

class Value
{
    /**
     * @var \DesignPattern\More\EntityAttributeValue\Attribute
     */
    private $attribute;

    /**
     * @var string
     */
    private $name;

    /**
     * Value constructor.
     *
     * @param \DesignPattern\More\EntityAttributeValue\Attribute $attribute
     * @param string                                             $name
     */
    public function __construct(Attribute $attribute, string $name)
    {
        $this->attribute = $attribute;
        $this->name = $name;

        $this->attribute->addValue($this);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s: %s', $this->attribute, $this->name);
    }
}
