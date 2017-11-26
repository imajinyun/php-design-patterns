<?php

namespace DesignPattern\Creational\AbstractFactory\Html;

use DesignPattern\Creational\AbstractFactory\Image as BaseImage;

class Image extends BaseImage
{
    /**
     * Render html image.
     *
     * @return string
     */
    public function render() : string
    {
        return sprintf('<img src="%s" title="%s">', $this->path, $this->title);
    }
}
