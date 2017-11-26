<?php

namespace DesignPattern\Structural\Composite;

class LabelElement implements RenderableInterface
{
    /**
     * @var string
     */
    private $for;

    /**
     * @var string
     */
    private $name;

    /**
     * TextElement constructor.
     *
     * @param string $for
     * @param string $name
     */
    public function __construct(string $for, string $name = 'Label Name:')
    {
        $this->for = $for;
        $this->name = $name;
    }

    /**
     * Text render.
     *
     * @return string
     */
    public function render() : string
    {
        $format = '<label for="%s">%s</label>';

        return sprintf($format, $this->for, $this->name);
    }
}
