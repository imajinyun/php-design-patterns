<?php

declare(strict_types=1);

namespace DesignPattern\Behavioral\State;

abstract class AbstractState implements StateInterface
{
    /**
     * To cancel order.
     *
     * @param  \DesignPattern\Behavioral\State\Order  $order
     *
     * @return mixed
     */
    public function toCancel(Order $order)
    {
        $order->setState(new Cancel());

        return true;
    }
}
