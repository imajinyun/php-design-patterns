<?php

declare(strict_types=1);

namespace DesignPattern\Behavioral\NullObject;

class Service
{
    /**
     * @var \DesignPattern\Behavioral\NullObject\LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * Service constructor.
     *
     * @param  \DesignPattern\Behavioral\NullObject\LoggerInterface  $logger
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
    public function error(): void
    {
        $log = '[ ' . date('Y-m-d H:i:s') . ' ] - Error: ' . __CLASS__;
        $this->logger->log($log);
    }
}
