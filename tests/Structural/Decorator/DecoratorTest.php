<?php

namespace DesignPattern\Test\Structural\Decorator;

use DesignPattern\Structural\Decorator\JsonRender;
use DesignPattern\Structural\Decorator\Webservice;
use DesignPattern\Structural\Decorator\XmlRender;
use PHPUnit\Framework\TestCase;

class DecoratorTest extends TestCase
{
    /**
     * @var \DesignPattern\Structural\Decorator\Webservice
     */
    private $service;

    protected function setUp()
    {
        $this->service = new Webservice('DecoratorPattern');
    }

    public function testJsonDecorator()
    {
        $json = new JsonRender($this->service);

        $expected = '"DecoratorPattern"';
        self::assertEquals($expected, $json->render());
    }

    public function testXmlDecorator()
    {
        $xml = new XmlRender($this->service);

        $expected = '<?xml version="1.0"?><content>DecoratorPattern</content>';
        self::assertXmlStringEqualsXmlString($expected, $xml->render());
    }
}
