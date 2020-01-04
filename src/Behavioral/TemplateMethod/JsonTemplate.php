<?php

declare(strict_types=1);

namespace DesignPattern\Behavioral\TemplateMethod;

class JsonTemplate extends AbstractTemplate
{
    /**
     * @return string
     */
    protected function doSomething(): string
    {
        $stdClass = new \stdClass();
        $stdClass->method = __METHOD__;

        return json_encode($stdClass, JSON_THROW_ON_ERROR, 512);
    }

    protected function getHelper(): void
    {
    }
}
