<?php

declare(strict_types=1);

namespace DesignPattern\Structural\Composite;

class Form implements RenderableInterface
{
    /**
     * @var string
     */
    private string $action;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var array
     */
    private array $elements;

    /**
     * @var int
     */
    private static int $elementNumber = 0;

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
    public function render(): string
    {
        static $i = 0;
        $form = '';

        if ($i === 0) {
            $form .= '<form action="%s" name="%s">';
        }

        foreach ($this->elements as $element) {
            $form .= $element->render();
            ++$i;
        }

        if ($i === self::$elementNumber) {
            $form .= '</form>';
        }

        return sprintf($form, $this->action, $this->name);
    }

    /**
     * Add element to elements array.
     *
     * @param \DesignPattern\Structural\Composite\RenderableInterface $element
     */
    public function addElement(RenderableInterface $element): void
    {
        $this->elements[] = $element;
        static::$elementNumber++;
    }
}
