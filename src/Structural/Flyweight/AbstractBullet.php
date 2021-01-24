<?php

declare(strict_types=1);

namespace DesignPattern\Structural\Flyweight;

abstract class AbstractBullet implements BulletInterface
{
    /**
     * Extrinsic state.
     *
     * @var int
     */
    private int $positionInMagazine;

    /**
     * Setting extrinsic state.
     *
     * @param  int  $positionInMagazine
     *
     * @return void
     */
    public function setPositionInMagazine(int $positionInMagazine = 0): void
    {
        $this->positionInMagazine = $positionInMagazine;
    }

    /**
     * @return int
     */
    public function getPositionInMagazine(): int
    {
        return $this->positionInMagazine;
    }
}
