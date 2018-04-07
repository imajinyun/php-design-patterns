<?php

namespace DesignPattern\Behavioral\ChainOfResponsibility;

use Psr\Http\Message\RequestInterface;

/**
 * Class DatabaseHandler
 *
 * @package DesignPattern\Behavioral\ChainOfResponsibility
 */
class DatabaseHandler extends Handler
{
    /**
     * Database processing.
     *
     * @param \Psr\Http\Message\RequestInterface $request
     *
     * @return string
     */
    protected function process(RequestInterface $request): string
    {
        // Generally, the database should be used here.
        return 'Storage data in Database.';
    }
}
