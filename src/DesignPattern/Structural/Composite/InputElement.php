<?php

namespace DesignPattern\Structural\Composite;

class InputElement implements RenderableInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * InputElement constructor.
     *
     * @param string $name
     * @param string $type
     */
    public function __construct(string $name, string $type = 'text')
    {
        $this->name = $name;
        $this->type = $type;
    }

    /**
     * Input render.
     *
     * @return string
     */
    public function render() : string
    {
        $format = '<input type="%s" name="%s">';

        return sprintf($format, $this->type, $this->name);
    }
}
