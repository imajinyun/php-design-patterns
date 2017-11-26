<?php

namespace DesignPattern\Test\Behavioral\ChainOfResponsibility;

use DesignPattern\Behavioral\ChainOfResponsibility\DatabaseHandler;
use DesignPattern\Behavioral\ChainOfResponsibility\MemoryHandler;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

class ChainOfResponsibilityTest extends TestCase
{
    /**
     * @var \DesignPattern\Behavioral\ChainOfResponsibility\Handler
     */
    private $chain;

    protected function setUp()
    {
        $this->chain = new MemoryHandler(
            ['/foo/bar?page=1' => 'Storage data in Memory.'],
            new DatabaseHandler()
        );
    }

    public function testCanRequestKeyInFastStorage()
    {
        $request = $this->getRequest('page=1');
        $expected = 'Storage data in Memory.';
        self::assertEquals($expected, $this->chain->handle($request));
    }

    public function testCanRequestKeyInSlowStorage()
    {
        $request = $this->getRequest();
        $expected = 'Storage data in Database.';
        self::assertEquals($expected, $this->chain->handle($request));
    }

    protected function getRequest(string $query = '') : RequestInterface
    {
        $uri = $this->createMock(UriInterface::class);
        $uri->method('getPath')->willReturn('/foo/bar');
        $uri->method('getQuery')->willReturn($query);

        $request = $this->createMock(RequestInterface::class);
        $request->method('getMethod')->willReturn('GET');
        $request->method('getUri')->willReturn($uri);

        return $request;
    }
}
