<?php

namespace DesignPattern\Test\Creational\FactoryMethod;

use DesignPattern\Creational\FactoryMethod\FactoryMethod;
use DesignPattern\Creational\FactoryMethod\FoxconnFactory;
use DesignPattern\Creational\FactoryMethod\NotebookInterface;
use PHPUnit\Framework\TestCase;

class FactoryMethodTest extends TestCase
{
    /**
     * @var array
     */
    protected $type = [
        FactoryMethod::LOW_CONFIG,
        FactoryMethod::MEDIUM_CONFIG,
        FactoryMethod::HIGH_CONFIG,
    ];

    /**
     * @return array
     */
    public function getFactories(): array
    {
        return [
            [new FoxconnFactory()],
        ];
    }

    /**
     * @dataProvider getFactories
     *
     * @param FactoryMethod $method
     */
    public function testFactoryMethod(FactoryMethod $method): void
    {
        $expected = NotebookInterface::class;
        foreach ($this->type as $type) {
            $notebook = $method->create($type);
            $this->assertInstanceOf($expected, $notebook);
        }
    }

    public function testInvalidArgumentException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $expected = NotebookInterface::class;
        $actual = (new FoxconnFactory())->create(FactoryMethod::GENERAL_CONFIG);
        self::assertInstanceOf($expected, $actual);
    }
}
