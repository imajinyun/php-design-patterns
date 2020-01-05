<?php

declare(strict_types=1);

namespace DesignPattern\Creational\AbstractFactory\Html;

use DesignPattern\Creational\AbstractFactory\Text as BaseText;

class Text extends BaseText
{
    /**
     * Render html text.
     *
     * @return string
     */
    public function render(): string
    {
        return sprintf('<div>%s</div>', htmlspecialchars($this->text));
    }
}
