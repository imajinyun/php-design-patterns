<?php

declare(strict_types=1);

namespace DesignPattern\Test\Structural\Flyweight;

use DesignPattern\Structural\Flyweight\BulletFactory;
use DesignPattern\Structural\Flyweight\EmptyBullet;
use DesignPattern\Structural\Flyweight\Gun;
use PHPUnit\Framework\TestCase;

class FlyweightTest extends TestCase
{
    public function testFlyweight(): void
    {
        $gun = new Gun(2);
        BulletFactory::getInstance('EmptyBullet');
        BulletFactory::getInstance('ExpandBullet');

        self::assertEquals(
            $gun->getMaxBullets(),
            BulletFactory::getBulletCount()
        );
    }

    public function testReload(): void
    {
        $gun = new Gun(3);

        self::assertEmpty($gun->getBullets());
        $gun->reload('ExpandBullet');
        $actual = count($gun->getBullets());

        self::assertEquals($gun->getMaxBullets(), $actual);
    }

    public function testBulletsAreSameObject(): void
    {
        $gun = new Gun(5);
        $gun->reload('EmptyBullet');

        foreach ($gun->getBullets() as $bullet) {
            self::assertSame(
                BulletFactory::getInstance('EmptyBullet'),
                $bullet
            );
        }
    }

    public function testExtrinsicState(): void
    {
        $gun = new Gun(2);
        $gun->reload('EmptyBullet');

        $format = 'Bullet %d fired - `%s`';
        $class = EmptyBullet::class;
        self::assertSame(sprintf($format, 1, $class), $gun->fire());
        self::assertSame(sprintf($format, 2, $class), $gun->fire());
        self::assertSame('Reload gun!', $gun->fire());
    }
}
