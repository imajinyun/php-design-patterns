<?php

namespace DesignPattern\Behavioral\Memento;

class Order
{
    /**
     * @var \DesignPattern\Behavioral\Memento\State
     */
    private $state;

    /**
     * Order constructor.
     *
     * @param \DesignPattern\Behavioral\Memento\State $state
     */
    public function __construct(State $state)
    {
        $this->state = $state;
    }

    /**
     * Save state to memento.
     *
     * @return \DesignPattern\Behavioral\Memento\Memento
     */
    public function saveStateToMemento() : Memento
    {
        return new Memento(clone $this->state);
    }

    /**
     * Restore state from memento.
     *
     * @param \DesignPattern\Behavioral\Memento\Memento|null $memento
     */
    public function restoreStateFromMemento(Memento $memento = null)
    {
        $this->state = $memento !== null ? $memento->getState() : null;
    }

    /**
     * Get current state object.
     *
     * @return \DesignPattern\Behavioral\Memento\State
     */
    public function getState() : State
    {
        return $this->state;
    }

    /**
     * Set current state object.
     *
     * @param \DesignPattern\Behavioral\Memento\State $state
     */
    public function setState(State $state)
    {
        $this->state = $state;
    }
}
