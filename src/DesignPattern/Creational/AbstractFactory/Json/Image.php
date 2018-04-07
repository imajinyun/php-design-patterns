<?php

namespace DesignPattern\Creational\AbstractFactory\Json;

use DesignPattern\Creational\AbstractFactory\Image as BaseImage;

class Image extends BaseImage
{
    /**
     * Render json image.
     *
     * @return string
     */
    public function render(): string
    {
        return json_encode(['src' => $this->path, 'title' => $this->title]);
    }
}
