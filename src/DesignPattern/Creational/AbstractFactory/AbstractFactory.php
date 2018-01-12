<?php

namespace DesignPattern\Creational\AbstractFactory;

abstract class AbstractFactory
{
    /**
     * Create a Image component.
     *
     * @param string $src
     * @param string $title
     *
     * @return \DesignPattern\Creational\AbstractFactory\Image
     */
    abstract public function createImage(
        string $src,
        string $title = ''
    ) : Image;

    /**
     * Create a Text component.
     *
     * @param string $text
     *
     * @return \DesignPattern\Creational\AbstractFactory\Text
     */
    abstract public function createText(string $text) : Text;
}
