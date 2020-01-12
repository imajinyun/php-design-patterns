<?php

declare(strict_types=1);

namespace DesignPattern\Structural\Flyweight;

class ExpandBullet extends AbstractBullet
{
    /**
     * Intrinsic state.
     *
     * @var int
     */
    private int $damage;

    /**
     * ExpandBullet constructor.
     */
    public function __construct()
    {
        $this->damage = 100;
    }
}
