<?php

declare(strict_types=1);

namespace DesignPattern\Behavioral\Mediator;

interface MediatorInterface
{
    public function sendRequest();

    public function query();

    public function recvResponse($content);
}
