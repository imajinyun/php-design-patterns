<?php

namespace DesignPattern\Structural\Composite;

class Form implements RenderableInterface
{
    /**
     * @var string
     */
    private $action;

    /**
     * @var string
     */
    private $name;

    private $elements;

    /**
     * @var int
     */
    private static $elementNumber;

    /**
     * Form constructor.
     *
     * @param string $action
     * @param string $name
     */
    public function __construct(string $action = '', string $name = '')
    {
        $this->action = $action;
        $this->name = $name;
    }

    /**
     * Render form.
     *
     * @return string
     */
    public function render() : string
    {
        static $i = 0;
        $form = '';

        if ($i === 0) {
            $form .= '<form action="%s" name="%s">';
        }

        foreach ((array)$this->elements as $element) {
            $form .= $element->render();
            ++$i;
        }

        if ($i === self::$elementNumber) {
            $form .= '</form>';
        }

        return sprintf($form, $this->action, $this->name);
    }

    /**
     * Add element.
     *
     * @param \DesignPattern\Structural\Composite\RenderableInterface $element
     */
    public function addElement(RenderableInterface $element)
    {
        $this->elements[] = $element;
        self::$elementNumber++;
    }
}
