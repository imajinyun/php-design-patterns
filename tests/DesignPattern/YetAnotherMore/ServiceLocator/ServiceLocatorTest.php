<?php

namespace DesignPattern\Test\YetAnotherMore\ServiceLocator;

use DesignPattern\YetAnotherMore\ServiceLocator\RequestService;
use DesignPattern\YetAnotherMore\ServiceLocator\ResponseService;
use DesignPattern\YetAnotherMore\ServiceLocator\ServiceLocator;
use PHPUnit\Framework\TestCase;

class ServiceLocatorTest extends TestCase
{
    /**
     * @var \DesignPattern\YetAnotherMore\ServiceLocator\ServiceLocator
     */
    private $serviceLocator;

    protected function setUp()
    {
        $this->serviceLocator = new ServiceLocator();
    }

    public function testHasServices()
    {
        $this->serviceLocator->addInstance(
            RequestService::class,
            RequestService::class
        );
        $request = $this->serviceLocator->get(RequestService::class);
        self::assertNotInstanceOf(RequestService::class, $request);
        self::assertTrue($this->serviceLocator->has(RequestService::class));

        $this->serviceLocator->addInstance(
            ResponseService::class,
            ResponseService::class
        );
        $response = $this->serviceLocator->get(ResponseService::class);
        self::assertNotInstanceOf(ResponseService::class, $response);
        self::assertTrue($this->serviceLocator->has(ResponseService::class));
        self::assertFalse($this->serviceLocator->has(self::class));
    }

    public function testInstantiatedServices()
    {
        $this->serviceLocator->addClass(RequestService::class, []);
        $request = $this->serviceLocator->get(RequestService::class);
        self::assertInstanceOf(RequestService::class, $request);

        $this->serviceLocator->addClass(ResponseService::class, [1], true);
        $response = $this->serviceLocator->get(ResponseService::class);
        self::assertInstanceOf(ResponseService::class, $response);
    }

    /**
     * @expectedException \OutOfRangeException
     */
    public function testManyArgument()
    {
        $this->serviceLocator->addClass(
            \stdClass::class,
            [1, 2, 3, 4, 5, 6],
            true
        );
        $stdClass = $this->serviceLocator->get(\stdClass::class);
        self::assertInstanceOf(\stdClass::class, $stdClass);
    }
}
