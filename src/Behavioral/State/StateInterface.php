<?php

namespace DesignPattern\Behavioral\State;

interface StateInterface
{
    /**
     * Order cancel.
     *
     * @param \DesignPattern\Behavioral\State\Order $order
     *
     * @return mixed
     */
    public function toCancel(Order $order);

    /**
     * Order payment.
     *
     * @param \DesignPattern\Behavioral\State\Order $order
     *
     * @return mixed
     */
    public function toPay(Order $order);

    /**
     * Order dispatch.
     *
     * @param \DesignPattern\Behavioral\State\Order $order
     *
     * @return mixed
     */
    public function toDispatch(Order $order);
}
