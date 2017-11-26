<?php

namespace DesignPattern\Test\Structural\DependencyInjection;

use DesignPattern\Structural\DependencyInjection\AbstractMap;
use DesignPattern\Structural\DependencyInjection\BaiduMap;
use DesignPattern\Structural\DependencyInjection\DepartmentStore;
use DesignPattern\Structural\DependencyInjection\GoogleMap;
use PHPUnit\Framework\TestCase;

class DependencyInjectionTest extends TestCase
{
    /**
     * @return array
     */
    public function getMaps() : array
    {
        return [
            [new BaiduMap()],
            [new GoogleMap()],
        ];
    }

    /**
     * @dataProvider getMaps
     *
     * @param AbstractMap $map
     */
    public function testMapDependencyInjection(AbstractMap $map)
    {
        $store = new DepartmentStore($map);
        $address = '中关村大厦';
        $google = [
            'longitude' => 120.19,
            'latitude'  => 48.75,
            'address'   => $address,
        ];
        sort($google);
        $expected = json_encode($google);
        self::assertEquals($expected, $store->getStoreCoordinate($address));
    }
}
