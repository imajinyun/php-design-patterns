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
     * @var \DesignPattern\Behavioral\State\Order
     */
    private Order $order;

    protected function setUp(): void
    {
        $this->order = new Order();
    }

    public function testCancelOfCancelState(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionCode(1);
        $this->order->setState(new Cancel());
        $this->order->cancel();
    }

    public function testPayOfCancelState(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionCode(2);
        $this->order->setState(new Cancel());
        $this->order->pay();
    }

    public function testDispatchOfCancelState(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionCode(3);
        $this->order->setState(new Cancel());
        $this->order->dispatch();
    }

    public function testPayState(): void
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

    public function testDispatchState(): void
    {
        $this->order->setState(new Dispatch());
        self::assertTrue($this->order->cancel());
        self::assertInstanceOf(Cancel::class, $this->order->getState());

        $this->order->setState(new Dispatch());

        /** @noinspection DynamicInvocationViaScopeResolutionInspection */
        $this->expectExceptionMessage('Already paid.');
        $this->order->pay();
    }

    public function testDispatchOfDispatchState(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Already dispatched.');
        $this->order->setState(new Dispatch());
        $this->order->dispatch();
    }
}
