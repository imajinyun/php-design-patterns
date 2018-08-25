<?php
declare(strict_types=1);

namespace DesignPattern\Test\Creational\AbstractFactory;

use DesignPattern\Creational\AbstractFactory\AbstractFactory;
use DesignPattern\Creational\AbstractFactory\HtmlFactory;
use DesignPattern\Creational\AbstractFactory\JsonFactory;
use DesignPattern\Creational\AbstractFactory\RendererInterface;
use PHPUnit\Framework\TestCase;

class AbstractFactoryTest extends TestCase
{
    /**
     * @return array
     */
    public function getFactories(): array
    {
        return [
            [new HtmlFactory()],
            [new JsonFactory()],
        ];
    }

    /**
     * @dataProvider getFactories
     *
     * @param AbstractFactory $factory
     */
    public function testFactories(AbstractFactory $factory)
    {
        $type = RendererInterface::class;
        $haystack = [
            $factory->createText('this is a test text.'),
            $factory->createImage('/img/image.jpg', 'caption'),
        ];

        $this->assertContainsOnly($type, $haystack);
    }

    /**
     * @dataProvider getFactories
     *
     * @param AbstractFactory $factory
     */
    public function testHtmlFactory(AbstractFactory $factory)
    {
        $contains = [
            '<div>Render text.</div>',
            '<img src="/img/image.jpg" title="caption">',
            '{"text":"Render text."}',
            '{"src":"\/img\/image.jpg","title":"caption"}',
        ];
        $text = $factory->createText('Render text.')->render();
        self::assertContains($text, $contains);


        $image = $factory->createImage('/img/image.jpg', 'caption')->render();
        self::assertContains($image, $contains);
    }
}
