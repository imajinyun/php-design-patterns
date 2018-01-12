<?php

namespace DesignPattern\Behavioral\TemplateMethod;

/**
 * Class JsonTemplate
 *
 * @package DesignPattern\Behavioral\TemplateMethod
 */
class JsonTemplate extends AbstractTemplate
{
    /**
     * @return string
     */
    protected function doSomething() : string
    {
        $stdClass = new \stdClass();
        $stdClass->method = __METHOD__;

        return json_encode($stdClass);
    }

    protected function getHelper() : void
    {
    }
}
