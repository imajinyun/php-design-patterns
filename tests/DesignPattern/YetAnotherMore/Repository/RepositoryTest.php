<?php

namespace DesignPattern\Test\YetAnotherMore\Repository;

use DesignPattern\YetAnotherMore\Repository\MemoryStorage;
use DesignPattern\YetAnotherMore\Repository\User;
use DesignPattern\YetAnotherMore\Repository\UserRepository;
use PHPUnit\Framework\TestCase;

/**
 * Repository Test.
 *
 * @package DesignPattern\Test\YetAnotherMore\Repository
 */
class RepositoryTest extends TestCase
{
    public function testUserRepository()
    {
        $repository = new UserRepository(new MemoryStorage());
        $user1 = new User(0, 'Jack Ma', 'abc@163.com');
        $user2 = new User(0, 'Jack Li', 'def@163.com');

        $repository->save($user1);
        $repository->save($user2);
        $object1 = $repository->find(1);
        $object2 = $repository->find(2);

        self::assertEquals(1, $user1->getId());
        self::assertEquals(2, $user2->getId());
        self::assertEquals($user1->getId(), $object1->getId());
        self::assertEquals($user2->getId(), $object2->getId());
        self::assertEquals($user1->getUsername(), $object1->getUsername());
        self::assertEquals($user2->getUsername(), $object2->getUsername());
        self::assertEquals($user1->getEmail(), $object1->getEmail());
        self::assertEquals($user2->getEmail(), $object2->getEmail());

        $repository->delete($user2);
    }

    public function testUser()
    {
        $repository = new UserRepository(new MemoryStorage());
        $user = new User(0, '', '');
        $user->setId(1001);
        $user->setUsername('Tom');
        $user->setEmail('tom@qq.com');
        $repository->save($user);
        $object = $repository->find($user->getId());

        self::assertEquals($user->getId(), $object->getId());
        self::assertEquals($user->getUsername(), $object->getUsername());
        self::assertEquals($user->getEmail(), $object->getEmail());
    }
}
