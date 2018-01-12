<?php

namespace DesignPattern\Behavioral\NullObject;

class Service
{
    /**
     * @var \DesignPattern\Behavioral\NullObject\LoggerInterface
     */
    private $logger;

    /**
     * Service constructor.
     *
     * @param \DesignPattern\Behavioral\NullObject\LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Error log.
     *
     * @return void
     */
    public function error()
    {
        $this->logger->log('[ ' . date('Y-m-d H:i:s') . ' ] - Error: '
            . __CLASS__);
    }
}
