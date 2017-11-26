<?php

namespace DesignPattern\Structural\Flyweight;

class BulletFactory
{
    /**
     * @var array|\DesignPattern\Structural\Flyweight\BulletInterface[]
     */
    private static $bullets = [];

    /**
     * Get bullet instance by type.
     *
     * @param string $type
     *
     * @return \DesignPattern\Structural\Flyweight\BulletInterface
     */
    public static function getInstance(string $type) : BulletInterface
    {
        if (!array_key_exists($type, self::$bullets)) {
            if ($type === 'EmptyBullet') {
                self::$bullets[$type] = new EmptyBullet();
            } elseif ($type === 'ExpandBullet') {
                self::$bullets[$type] = new ExpandBullet();
            }
        }

        return self::$bullets[$type];
    }

    /**
     * @return int
     */
    public static function getBulletCount() : int
    {
        return count(self::$bullets);
    }
}
