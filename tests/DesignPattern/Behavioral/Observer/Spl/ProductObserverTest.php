<?php

namespace DesignPattern\Test\Behavioral\Observer;

use DesignPattern\Behavioral\Observer\Spl\Product;
use DesignPattern\Behavioral\Observer\Spl\ProductObserver;
use PHPUnit\Framework\TestCase;

class ProductObserverTest extends TestCase
{
    public function testObserverIsUpdated()
    {
        $observer = $this->getMockBuilder(ProductObserver::class)
                         ->setMethods(['update'])
                         ->getMock();

        $observer->expects($this->once())
                 ->method('update')
                 ->with($this->isInstanceOf('SplSubject'));

        $subject = new Product('My Product');
        $subject->attach($observer);
        $subject->notify();

        self::assertEquals('My Product', $subject->getName());
        self::assertEquals(0, $subject->getPrice());
    }
}
