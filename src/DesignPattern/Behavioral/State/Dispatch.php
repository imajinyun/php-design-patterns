<?php

namespace DesignPattern\Behavioral\State;

class Dispatch extends AbstractState
{
    /**
     * To pay.
     *
     * @param Order $order
     *
     * @throws \LogicException
     */
    public function toPay(Order $order)
    {
        throw new \LogicException('Already paid.');
    }

    /**
     * To dispatch.
     *
     * @param Order $order
     *
     * @throws \LogicException
     */
    public function toDispatch(Order $order)
    {
        throw new \LogicException('Already dispatched.');
    }
}
