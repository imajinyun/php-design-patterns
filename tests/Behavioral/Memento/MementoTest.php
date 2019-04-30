<?php

namespace DesignPattern\Test\Behavioral\Memento;

use DesignPattern\Behavioral\Memento\History;
use DesignPattern\Behavioral\Memento\Order;
use DesignPattern\Behavioral\Memento\State;
use PHPUnit\Framework\TestCase;

class MementoTest extends TestCase
{
    /**
     * @var Order
     */
    private $order;

    protected function setUp(): void
    {
        $this->order = new Order(new State());
    }

    public function testUndoMementoState(): void
    {
        $history = new History();
        $history->addMemento($this->order->saveStateToMemento());

        $previousState = $this->order->getState();
        $this->order->setState(new State(State::STATUS_CONFIRMED));
        self::assertNotSame($previousState, $this->order->getState());

        $this->order->restoreStateFromMemento($history->popMemento());
        self::assertEquals($previousState, $this->order->getState());
    }

    public function testMementoStateInstanceIsDifferentFromState(): void
    {
        $history = new History();
        $history->addMemento($this->order->saveStateToMemento());
        self::assertCount(1, $history);

        $state = $history->popMemento()->getState();
        self::assertNotSame($state, $this->order->getState());
    }

    public function testPopupMementoInstance(): void
    {
        $stub = $this->getMockBuilder(History::class)->getMock();
        $stub->method('popMemento')
            ->will($this->returnSelf());

        self::assertSame($stub, $stub->popMemento());
    }

    public function testPopupMementoNull(): void
    {
        $stub = $this->getMockBuilder(History::class)->getMock();
        $stub->method('popMemento')
            ->willReturn(null);

        self::assertEquals(null, $stub->popMemento());
    }
}
