<?php

namespace DesignPattern\Structural\Flyweight;

class ExpandBullet extends AbstractBullet
{
    /**
     * Intrinsic state.
     *
     * @var
     */
    private $damage;

    /**
     * ExpandBullet constructor.
     */
    public function __construct()
    {
        $this->damage = 100;
    }
}
