<?php

namespace DesignPattern\Behavioral\ChainOfResponsibility;

use Psr\Http\Message\RequestInterface;

class MemoryHandler extends Handler
{
    /**
     * @var array
     */
    private array $data;

    /**
     * MemoryHandler constructor.
     *
     * @param array $data
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

        if (isset($this->data[$key]) && $request->getMethod() === 'GET') {
            return $this->data[$key];
        }

        return null;
    }
}
