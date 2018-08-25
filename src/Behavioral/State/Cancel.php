<?php

namespace DesignPattern\Behavioral\State;

class Cancel extends AbstractState
{
    public const ORDER_CANCEL = 1;
    public const ORDER_PAY = 2;
    public const ORDER_DISPATCH = 3;

    /**
     * @param Order $order
     *
     * @throws \LogicException
     */
    public function toCancel(Order $order)
    {
        throw new \LogicException('Already cancelled.', self::ORDER_CANCEL);
    }

    /**
     * @param Order $order
     *
     * @throws \LogicException
     */
    public function toPay(Order $order)
    {
        throw new \LogicException('Order cancelled.', self::ORDER_PAY);
    }

    /**
     * @param Order $order
     *
     * @throws \LogicException
     */
    public function toDispatch(Order $order)
    {
        throw new \LogicException('Order cancelled.', self::ORDER_DISPATCH);
    }
}
