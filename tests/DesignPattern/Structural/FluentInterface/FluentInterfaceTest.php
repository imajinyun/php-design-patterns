<?php

namespace DesignPattern\Test\Structural\FluentInterface;

use DesignPattern\Structural\FluentInterface\Mysql;
use PHPUnit\Framework\TestCase;

class FluentInterfaceTest extends TestCase
{
    public function testQueryBuilder()
    {
        $query = (new Mysql())->select(['email', 'nickname', 'age'])
                              ->from('user', 'u')
                              ->where('u.email = ?');

        $expected
            = 'SELECT email,nickname,age FROM user AS u WHERE u.email = ?';
        self::assertEquals($expected, (string)$query);
    }
}
