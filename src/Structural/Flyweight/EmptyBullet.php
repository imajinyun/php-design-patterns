<?php

namespace DesignPattern\Structural\Flyweight;

class EmptyBullet extends AbstractBullet
{
    /**
     * Intrinsic state.
     *
     * @var int
     */
    private $damage;

    /**
     * EmptyBullet constructor.
     */
    public function __construct()
    {
        $this->damage = 0;
    }
}
