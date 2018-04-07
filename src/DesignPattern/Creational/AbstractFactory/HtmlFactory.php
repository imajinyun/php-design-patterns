<?php

namespace DesignPattern\Creational\AbstractFactory;

use DesignPattern\Creational\AbstractFactory\Html\Image as HtmlImage;
use DesignPattern\Creational\AbstractFactory\Html\Text as HtmlText;

class HtmlFactory extends AbstractFactory
{
    /**
     * Create a Image component implementation.
     *
     * @param string $src
     * @param string $title
     *
     * @return \DesignPattern\Creational\AbstractFactory\Image
     */
    public function createImage(string $src, string $title = ''): Image
    {
        return new HtmlImage($src, $title);
    }

    /**
     * Create a Text component implementation.
     *
     * @param string $text
     *
     * @return \DesignPattern\Creational\AbstractFactory\Text
     */
    public function createText(string $text): Text
    {
        return new HtmlText($text);
    }
}
