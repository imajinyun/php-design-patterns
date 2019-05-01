<?php

namespace DesignPattern\Test\Behavioral\Strategy;

use DesignPattern\Behavioral\Strategy\Collection;
use DesignPattern\Behavioral\Strategy\ComparatorInterface;
use DesignPattern\Behavioral\Strategy\DateComparator;
use DesignPattern\Behavioral\Strategy\IdentifyComparator;
use PHPUnit\Framework\TestCase;

class StrategyTest extends TestCase
{
    public function provideIdentifies(): array
    {
        return [
            [
                [['id' => 100], ['id' => 10], ['id' => 1000]],
                ['id' => 10],
            ],
            [
                [['id' => 8888], ['id' => 888], ['id' => 88]],
                ['id' => 88],
            ],
        ];
    }

    public function provideDates(): array
    {
        return [
            [
                [
                    ['date' => '2018-03-03'],
                    ['date' => '2019-12-12'],
                    ['date' => '2017-08-01'],
                ],
                ['date' => '2017-08-01'],
            ],
            [
                [
                    ['date' => '2100-11-11'],
                    ['date' => '2020-06-17'],
                    ['date' => '2050-04-12'],
                ],
                ['date' => '2020-06-17'],
            ],
        ];
    }

    /**
     * @dataProvider provideIdentifies
     *
     * @param array $collection
     * @param array $expected
     */
    public function testIdentifyComparator($collection, $expected): void
    {
        $element = $this->getElement($collection, new IdentifyComparator());
        self::assertEquals($expected, $element);
    }

    /**
     * @dataProvider provideDates
     *
     * @param array $collection
     * @param array $expected
     */
    public function testDateComparator($collection, $expected): void
    {
        $element = $this->getElement($collection, new DateComparator());
        self::assertEquals($expected, $element);
    }

    /**
     * Get compare element.
     *
     * @param array $collection
     * @param \DesignPattern\Behavioral\Strategy\ComparatorInterface $comparator
     *
     * @return mixed
     */
    protected function getElement(array $collection, ComparatorInterface $comparator)
    {
        $object = new Collection($collection);
        $object->setComparator($comparator);
        $elements = $object->sort();

        return array_shift($elements);
    }
}
