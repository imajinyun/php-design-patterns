<?php

namespace DesignPattern\Creational\AbstractFactory;

use DesignPattern\Creational\AbstractFactory\Json\Image as JsonImage;
use DesignPattern\Creational\AbstractFactory\Json\Text as JsonText;

class JsonFactory extends AbstractFactory
{
    /**
     * Create a image component implementation.
     *
     * @param string $src
     * @param string $title
     *
     * @return \DesignPattern\Creational\AbstractFactory\Image
     */
    public function createImage(string $src, string $title = ''): Image
    {
        return new JsonImage($src, $title);
    }

    /**
     * Create a text component implementation.
     *
     * @param string $text
     *
     * @return \DesignPattern\Creational\AbstractFactory\Text
     */
    public function createText(string $text): Text
    {
        return new JsonText($text);
    }
}
