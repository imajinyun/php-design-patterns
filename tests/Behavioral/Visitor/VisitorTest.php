<?php

namespace DesignPattern\Test\Behavioral\Visitor;

use DesignPattern\Behavioral\Visitor\Group;
use DesignPattern\Behavioral\Visitor\RoleInterface;
use DesignPattern\Behavioral\Visitor\RoleVisitor;
use DesignPattern\Behavioral\Visitor\User;
use PHPUnit\Framework\TestCase;

class VisitorTest extends TestCase
{
    /**
     * @var RoleVisitor
     */
    private $visitor;

    protected function setUp()
    {
        $this->visitor = new RoleVisitor();
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return [
            [new User('Admin')],
            [new Group('Administrator')],
        ];
    }

    /**
     * @dataProvider getRoles
     *
     * @param RoleInterface $role
     */
    public function testVisitSomeRole(RoleInterface $role)
    {
        $role->allow($this->visitor);
        self::assertSame($role, $this->visitor->getRole()[0]);
    }

    public function testGroup()
    {
        $group = new Group('Administrator');
        $expect = 'Group: Administrator';
        self::assertEquals($expect, $group->getName());
    }

    public function testUser()
    {
        $user = new User('Admin');
        $expect = 'User: Admin';
        self::assertEquals($expect, $user->getName());
    }
}
