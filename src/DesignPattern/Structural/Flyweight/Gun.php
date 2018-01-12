<?php

namespace DesignPattern\Structural\Flyweight;

class Gun
{
    /**
     * @var array|BulletInterface[]
     */
    private $bullets;

    /**
     * @var int
     */
    private $maxBullets;

    /**
     * Gun constructor.
     *
     * @param int $maxBullets
     */
    public function __construct(int $maxBullets)
    {
        $this->bullets = [];
        $this->maxBullets = $maxBullets;
    }

    /**
     * @return array|BulletInterface[]
     */
    public function getBullets() : array
    {
        return $this->bullets;
    }

    /**
     * @return int
     */
    public function getMaxBullets() : int
    {
        return $this->maxBullets;
    }

    /**
     * @param string $type
     *
     * @return void
     */
    public function reload(string $type) : void
    {
        $count = \count($this->bullets);
        for (; $count < $this->maxBullets; $count++) {
            $this->bullets[] = BulletFactory::getInstance($type);
        }
    }

    /**
     * @return string
     */
    public function fire() : string
    {
        if ($count = \count($this->bullets)) {
            $bullet = \array_shift($this->bullets);
            $bullet->setPositionInMagazine($this->maxBullets - $count + 1);

            return sprintf(
                'Bullet %d fired - `%s`',
                $bullet->getPositionInMagazine(),
                \get_class($bullet)
            );
        }

        return 'Reload gun!';
    }
}
