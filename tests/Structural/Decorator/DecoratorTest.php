<?php

declare(strict_types=1);

namespace DesignPattern\Test\Structural\Decorator;

use DesignPattern\Structural\Decorator\{JsonRender, Webservice, XmlRender};
use PHPUnit\Framework\TestCase;

class DecoratorTest extends TestCase
{
    /**
     * @var \DesignPattern\Structural\Decorator\Webservice
     */
    private Webservice $service;

    protected function setUp(): void
    {
        $this->service = new Webservice('DecoratorPattern');
    }

    public function testJsonDecorator(): void
    {
        $json = new JsonRender($this->service);

        $expected = '"DecoratorPattern"';
        self::assertEquals($expected, $json->render());
    }

    public function testXmlDecorator(): void
    {
        $xml = new XmlRender($this->service);

        $expected = '<?xml version="1.0"?><content>DecoratorPattern</content>';
        self::assertXmlStringEqualsXmlString($expected, $xml->render());
    }
}
