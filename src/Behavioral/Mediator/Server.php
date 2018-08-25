<?php

namespace DesignPattern\Behavioral\Mediator;

class Server extends AbstractColleague
{
    public function response()
    {
        $data = $this->getMediator()->query();

        return $this->getMediator()->sendResponse(sprintf('Hello %s', $data));
    }
}
