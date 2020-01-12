<?php

declare(strict_types=1);

namespace DesignPattern\Structural\Flyweight;

class EmptyBullet extends AbstractBullet
{
    /**
     * Intrinsic state.
     *
     * @var int
     */
    private int $damage;

    /**
     * EmptyBullet constructor.
     */
    public function __construct()
    {
        $this->damage = 0;
    }
}
