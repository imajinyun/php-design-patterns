<?php

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
        return json_encode(['text' => $this->text]);
    }
}
