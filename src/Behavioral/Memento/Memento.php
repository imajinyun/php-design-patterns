<?php
declare(strict_types=1);

namespace DesignPattern\Behavioral\Memento;

class Memento
{
    /**
     * @var \DesignPattern\Behavioral\Memento\State
     */
    private State $state;

    /**
     * Memento constructor.
     *
     * @param \DesignPattern\Behavioral\Memento\State $state
     */
    public function __construct(State $state)
    {
        $this->state = $state;
    }

    /**
     * Get state object.
     *
     * @return \DesignPattern\Behavioral\Memento\State
     */
    public function getState(): State
    {
        return $this->state;
    }
}
