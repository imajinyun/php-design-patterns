<?php

namespace DesignPattern\Behavioral\ChainOfResponsibility;

use Psr\Http\Message\RequestInterface;

/**
 * Class MemoryHandler
 *
 * @package DesignPattern\Behavioral\ChainOfResponsibility
 */
class MemoryHandler extends Handler
{
    /**
     * @var array
     */
    private $data;

    /**
     * MemoryHandler constructor.
     *
     * @param array                                                        $data
     * @param \DesignPattern\Behavioral\ChainOfResponsibility\Handler|null $handler
     */
    public function __construct(array $data, Handler $handler = null)
    {
        parent::__construct($handler);

        $this->data = $data;
    }

    /**
     * Memory processing.
     *
     * @param \Psr\Http\Message\RequestInterface $request
     *
     * @return mixed|null
     */
    protected function process(RequestInterface $request)
    {
        $key = sprintf(
            '%s?%s',
            $request->getUri()->getPath(),
            $request->getUri()->getQuery()
        );

        if ($request->getMethod() == 'GET' && isset($this->data[$key])) {
            return $this->data[$key];
        }

        return null;
    }
}
