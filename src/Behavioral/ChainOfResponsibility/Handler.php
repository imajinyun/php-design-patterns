<?php

namespace DesignPattern\Behavioral\ChainOfResponsibility;

use Psr\Http\Message\RequestInterface;

abstract class Handler
{
    /**
     * @var \DesignPattern\Behavioral\ChainOfResponsibility\Handler|null
     */
    private ?Handler $handler;

    /**
     * Handler constructor.
     *
     * @param \DesignPattern\Behavioral\ChainOfResponsibility\Handler|null $handler
     */
    public function __construct(Handler $handler = null)
    {
        $this->handler = $handler;
    }

    /**
     * Handle request.
     *
     * @param \Psr\Http\Message\RequestInterface $request
     *
     * @return mixed
     */
    final public function handle(RequestInterface $request)
    {
        $process = $this->process($request);

        if ($process === null && $this->handler !== null) {
            $process = $this->handler->handle($request);
        }

        return $process;
    }

    /**
     * Processing method.
     *
     * @param RequestInterface $request
     *
     * @return mixed
     */
    abstract protected function process(RequestInterface $request);
}
