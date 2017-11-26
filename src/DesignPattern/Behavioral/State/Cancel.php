<?php

namespace DesignPattern\Behavioral\State;

class Cancel extends AbstractState
{
    const ORDER_CANCEL = 1;
    const ORDER_PAY = 2;
    const ORDER_DISPATCH = 3;

    /**
     * @param Order $order
     *
     * @throws \LogicException
     * @return void
     */
    public function toCancel(Order $order)
    {
        throw new \LogicException('Already cancelled.', Cancel::ORDER_CANCEL);
    }

    /**
     * @param Order $order
     *
     * @throws \LogicException
     * @return void
     */
    public function toPay(Order $order)
    {
        throw new \LogicException('Order cancelled.', Cancel::ORDER_PAY);
    }

    /**
     * @param Order $order
     *
     * @throws \LogicException
     * @return void
     */
    public function toDispatch(Order $order)
    {
        throw new \LogicException('Order cancelled.', Cancel::ORDER_DISPATCH);
    }
}
