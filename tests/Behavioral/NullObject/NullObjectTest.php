<?php

namespace DesignPattern\Test\Behavioral\NullObject;

use DesignPattern\Behavioral\NullObject\NullLogger;
use DesignPattern\Behavioral\NullObject\PrintLogger;
use DesignPattern\Behavioral\NullObject\Service;
use PHPUnit\Framework\TestCase;

class NullObjectTest extends TestCase
{
    public function testNullLogger(): void
    {
        $service = new Service(new NullLogger());
        $this->expectOutputString('');
        $service->error();
    }

    public function testPrintLogger(): void
    {
        $service = new Service(new PrintLogger());
        $expect = '[ ' . date('Y-m-d H:i:s') . ' ] - Error: ' . Service::class;
        $this->expectOutputString($expect);
        $service->error();
    }
}
