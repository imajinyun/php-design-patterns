<?php

namespace DesignPattern\Behavioral\TemplateMethod;

/**
 * Class HtmlTemplate
 *
 * @package DesignPattern\Behavioral\TemplateMethod
 */
class HtmlTemplate extends AbstractTemplate
{
    /**
     * @return string
     */
    protected function doSomething() : string
    {
        return sprintf('<p>%s</p>', __METHOD__);
    }

    /**
     * @return string
     */
    protected function getHelper() : string
    {
        return 'Html template helper.';
    }
}
