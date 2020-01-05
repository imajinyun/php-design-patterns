<?php

declare(strict_types=1);

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
        $value = ['src' => $this->path, 'title' => $this->title];

        return json_encode($value, JSON_THROW_ON_ERROR, 512);
    }
}
