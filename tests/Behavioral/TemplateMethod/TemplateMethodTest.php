<?php

namespace DesignPattern\Test\Behavioral\TemplateMethod;

use DesignPattern\Behavioral\TemplateMethod\HtmlTemplate;
use DesignPattern\Behavioral\TemplateMethod\JsonTemplate;
use PHPUnit\Framework\TestCase;

/**
 * Class TemplateMethodTest
 *
 * @package DesignPattern\Test\Behavioral\TemplateMethod
 */
class TemplateMethodTest extends TestCase
{
    public function testHtmlTemplateDoSomething()
    {
        $html = new HtmlTemplate();
        $html->run();
        $expected = [
            'Are you ready?',
            'The task is executing...',
            'Html template helper.',
            '<p>DesignPattern\Behavioral\TemplateMethod\HtmlTemplate::doSomething</p>',
        ];
        self::assertEquals($expected, $html->getToDoThings());
    }

    public function testJsonTemplateDoSomething()
    {
        $json = new JsonTemplate();
        $json->run();
        $expected = [
            'Are you ready?',
            'The task is executing...',
            '{"method":"DesignPattern\\\\Behavioral\\\\TemplateMethod\\\\JsonTemplate::doSomething"}',
        ];
        self::assertEquals($expected, $json->getToDoThings());
    }
}
