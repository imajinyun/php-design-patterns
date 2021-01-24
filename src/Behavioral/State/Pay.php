<?php

declare(strict_types=1);

namespace DesignPattern\Behavioral\State;

class Pay extends AbstractState
{
    /**
     * @param  \DesignPattern\Behavioral\State\Order  $order
     *
     * @return bool
     */
    public function toPay(Order $order): bool
    {
        $order->setState(new Dispatch());

        return true;
    }

    /**
     * @param  \DesignPattern\Behavioral\State\Order  $order
     *
     * @throws \LogicException
     */
    public function toDispatch(Order $order)
    {
        throw new \LogicException('The order has to be paid before processing dispatch.');
    }
}
