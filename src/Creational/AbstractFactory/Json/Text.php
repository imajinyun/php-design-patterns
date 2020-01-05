<?php

declare(strict_types=1);

namespace DesignPattern\Creational\AbstractFactory\Json;

use DesignPattern\Creational\AbstractFactory\Text as BaseText;

class Text extends BaseText
{
    /**
     * Render json text.
     *
     * @return string
     */
    public function render(): string
    {
        $value = ['text' => $this->text];

        return json_encode($value, JSON_THROW_ON_ERROR, 512);
    }
}
