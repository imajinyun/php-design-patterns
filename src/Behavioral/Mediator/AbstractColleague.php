<?php

namespace DesignPattern\Behavioral\Mediator;

abstract class AbstractColleague
{
    /**
     * @var \DesignPattern\Behavioral\Mediator\MediatorInterface
     */
    private MediatorInterface $mediator;

    /**
     * AbstractColleague constructor.
     *
     * @param \DesignPattern\Behavioral\Mediator\MediatorInterface $mediator
     */
    public function __construct(MediatorInterface $mediator)
    {
        $this->mediator = $mediator;
    }

    /**
     * Get mediator object.
     *
     * @return \DesignPattern\Behavioral\Mediator\MediatorInterface
     */
    protected function getMediator(): MediatorInterface
    {
        return $this->mediator;
    }
}
