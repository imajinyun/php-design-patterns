<?php

namespace DesignPattern\State\Behavioral\State;

use DesignPattern\Behavioral\State\Cancel;
use DesignPattern\Behavioral\State\Dispatch;
use DesignPattern\Behavioral\State\Order;
use DesignPattern\Behavioral\State\Pay;
use PHPUnit\Framework\TestCase;

class StateTest extends TestCase
{
    /**
     * @var Order
     */
    private $order;

    protected function setUp()
    {
        $this->order = new Order();
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionCode 1
     */
    public function testCancelOfCancelState()
    {
        $this->order->setState(new Cancel());
        $this->order->cancel();
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionCode 2
     */
    public function testPayOfCancelState()
    {
        $this->order->setState(new Cancel());
        $this->order->pay();
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionCode 3
     */
    public function testDispatchOfCancelState()
    {
        $this->order->setState(new Cancel());
        $this->order->dispatch();
    }

    public function testPayState()
    {
        $this->order->setState(new Pay());
        self::assertTrue($this->order->cancel());
        self::assertInstanceOf(Cancel::class, $this->order->getState());

        $this->order->setState(new Pay());
        self::assertTrue($this->order->pay());
        self::assertInstanceOf(Dispatch::class, $this->order->getState());

        $this->order->setState(new Pay());
        $this->expectException(\Exception::class);
        $this->order->dispatch();
    }

    public function testDispatchState()
    {
        $this->order->setState(new Dispatch());
        self::assertTrue($this->order->cancel());
        self::assertInstanceOf(Cancel::class, $this->order->getState());

        $this->order->setState(new Dispatch());

        /** @noinspection DynamicInvocationViaScopeResolutionInspection */
        $this->expectExceptionMessage('Already paid.');
        $this->order->pay();
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Already dispatched.
     */
    public function testDispatchOfDispatchState()
    {
        $this->order->setState(new Dispatch());
        $this->order->dispatch();
    }
}
