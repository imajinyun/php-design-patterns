<?php

namespace DesignPattern\Test\Structural\Adapter;

use DesignPattern\Structural\Adapter\User;
use DesignPattern\Structural\Adapter\UserAdapter;
use DesignPattern\Structural\Adapter\Weibo;
use PHPUnit\Framework\TestCase;

class AdapterTest extends TestCase
{
    public function testCanUserNumberOnUser()
    {
        $user = new User();
        $user->login('user1', 'pass1');
        $user->login('user2', 'pass2');
        $number = $user->getLoginUserNumber();

        self::assertEquals(2, $number);
    }

    public function testCanLoginMemberNumberOnWeibo()
    {
        $appId = ['xXLa2CRTs7PWY4Bc', 'Ta9Z42qbFeHNBGfn'];
        $appSecret = [
            '2ABnIxeZH0SKpqrXFylcCfmO1uvUT9ML',
            '2D19WBJmC3TinqFkjRtfXaeAPYsOHUNG',
        ];

        $adapter = new UserAdapter(new Weibo());
        $adapter->login($appId[0], $appSecret[0]);
        $adapter->login($appId[1], $appSecret[1]);
        $number = $adapter->getLoginUserNumber();

        self::assertEquals(2, $number);
    }
}
