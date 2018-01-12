<?php

namespace DesignPattern\Test\Behavioral\Mediator;

use DesignPattern\Behavioral\Mediator\Consumer;
use DesignPattern\Behavioral\Mediator\Database;
use DesignPattern\Behavioral\Mediator\Server;
use DesignPattern\Behavioral\Mediator\Mediator;
use PHPUnit\Framework\TestCase;

class MediatorTest extends TestCase
{
    /**
     * @var Consumer
     */
    private $consumer;

    protected function setUp()
    {
        $mediator = new Mediator();
        $this->consumer = new Consumer($mediator);

        $mediator->setConsumer($this->consumer)
                 ->setServer(new Server($mediator))
                 ->setDatabase(new Database($mediator));
    }

    public function testConsumerRequest()
    {
        $this->expectOutputString('Hello World!');
        $this->consumer->request();
    }
}
