<?php

namespace DesignPattern\Behavioral\State;

class Order
{
    /**
     * @var \DesignPattern\Behavioral\State\StateInterface|null
     */
    private $state;

    public function cancel()
    {
        return $this->state->toCancel($this);
    }

    public function pay()
    {
        return $this->state->toPay($this);
    }

    public function dispatch()
    {
        return $this->state->toDispatch($this);
    }

    /**
     * @return \DesignPattern\Behavioral\State\StateInterface|null
     */
    public function getState() : StateInterface
    {
        return $this->state;
    }

    /**
     * @param \DesignPattern\Behavioral\State\StateInterface $state
     *
     * @return void
     */
    public function setState(StateInterface $state) : void
    {
        $this->state = $state;
    }
}
