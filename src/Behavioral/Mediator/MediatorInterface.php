<?php

namespace DesignPattern\Behavioral\Mediator;

interface MediatorInterface
{
    public function sendRequest();

    public function query();

    public function recvResponse($content);
}
