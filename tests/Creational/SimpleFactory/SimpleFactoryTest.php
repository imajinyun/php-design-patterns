<?php

namespace DesignPattern\Test\Creational\SimpleFactory;

use DesignPattern\Creational\SimpleFactory\LanguageInterface;
use DesignPattern\Creational\SimpleFactory\SimpleFactory;
use PHPUnit\Framework\TestCase;

class SimpleFactoryTest extends TestCase
{
    /**
     * @var SimpleFactory
     */
    protected $factory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = new SimpleFactory();
    }

    /**
     * @return array
     */
    public function getLanguage(): array
    {
        return [
            ['java'],
            ['swift'],
        ];
    }

    /**
     * @dataProvider getLanguage
     *
     * @param string $language
     */
    public function testSimpleFactory(string $language): void
    {
        $expected = LanguageInterface::class;
        $object = $this->factory->create($language);
        $this->assertInstanceOf($expected, $object);
    }

    /**
     * @dataProvider getLanguage
     *
     * @param string $language
     */
    public function testLanguage(string $language): void
    {
        $object = $this->factory->create($language);
        $actual = $object->toWriteApplication($language);
        $expect = 'using ' . ucfirst($language)
            . ' language to write application.';

        self::assertEquals($expect, $actual);
    }

    public function testBadLanguage(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->factory->create('Unknown');
    }
}
