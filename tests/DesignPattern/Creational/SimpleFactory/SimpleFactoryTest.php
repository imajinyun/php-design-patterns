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

    protected function setUp()
    {
        parent::setUp();
        $this->factory = new SimpleFactory();
    }

    /**
     * @return array
     */
    public function getLanguage() : array
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
    public function testSimpleFactory(string $language)
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
    public function testLanguage(string $language)
    {
        $object = $this->factory->create($language);
        $actual = $object->toWriteApplication($language);
        $expect = 'using ' . ucfirst($language)
            . ' language to write application.';

        self::assertEquals($expect, $actual);
    }

    /**
     * Test bad language.
     *
     * @expectedException \InvalidArgumentException
     */
    public function testBadLanguage()
    {
        $this->factory->create('Unknown');
    }
}
