<?php

namespace DesignPattern\Test\Structural\Bridge;

use DesignPattern\Structural\Bridge\DateFormatter;
use DesignPattern\Structural\Bridge\HtmlFormatter;
use DesignPattern\Structural\Bridge\StringService;
use PHPUnit\Framework\TestCase;

class BridgeTest extends TestCase
{
    public function testCanFormatterUsingTheDateFormatter(): void
    {
        $time = time();
        $service = new StringService(new DateFormatter());
        $this->assertEquals(date('Y-m-d', $time), $service->get());

        // now change the implemenation and use the HtmlFormatter instead
        $service->setFormatter(new HtmlFormatter());
        $this->assertEquals("<p>{$time}</p>", $service->get());
    }
}
