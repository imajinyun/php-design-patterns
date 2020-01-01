<?php

namespace DesignPattern\Test\Structural\DataMapper;

use DesignPattern\Structural\DataMapper\Repository;
use DesignPattern\Structural\DataMapper\User;
use DesignPattern\Structural\DataMapper\UserMapper;
use PHPUnit\Framework\TestCase;

class DataMapperTest extends TestCase
{
    public function testCanMapUserFromRepository(): void
    {
        $repository = new Repository(
            [
                1 => ['username' => 'user1', 'email' => 'user1@163.com'],
                2 => ['username' => 'user2', 'email' => 'user2@qq.com'],
            ]
        );
        $mapper = new UserMapper($repository);

        /** @var User $user */
        $user = $mapper->findById(1);
        self::assertInstanceOf(User::class, $user);
        self::assertEquals('user1', $user->getUsername());
        self::assertEquals('user1@163.com', $user->getEmail());
    }

    public function testWillNotMapInvalidData(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('User #1 not found.');
        $this->expectExceptionCode(1);
        $repository = new Repository([]);
        $mapper = new UserMapper($repository);

        $mapper->findById(1);
    }
}
