<?php

namespace DesignPattern\Structural\Flyweight;

abstract class AbstractBullet implements BulletInterface
{
    /**
     * Extrinsic state.
     *
     * @var int
     */
    private $positionInMagazine;

    /**
     * Setting extrinsic state.
     *
     * @param int $positionInMagazine
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
