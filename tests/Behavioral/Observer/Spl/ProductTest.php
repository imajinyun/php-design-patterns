<?php

namespace DesignPattern\Test\Behavioral\Observer;

use DesignPattern\Behavioral\Observer\Spl\Product;
use DesignPattern\Behavioral\Observer\Spl\ProductObserver;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testAttachAndDetachMethod(): void
    {
        $product = new Product();
        $observer = new ProductObserver();
        $observers = $product->getObservers();

        $observer->update($product);
        self::assertInstanceOf('SplObjectStorage', $observers);
        self::assertFalse($observers->contains($observer));

        $product->attach($observer);
        self::assertTrue($observers->contains($observer));

        $product->detach($observer);
        self::assertFalse($observers->contains($observer));
    }

    /**
     * Testing if notify method is called when modifying the product's price.
     */
    public function testNotify(): void
    {
        $observer = $this->getMockBuilder(Product::class)
            ->setMethods(['notify'])
            ->getMock();
        $observer->expects($this->once())
            ->method('notify');

        $observer->setPrice(100);
    }
}
