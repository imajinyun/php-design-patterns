<?php

declare(strict_types=1);

namespace DesignPattern\Behavioral\Visitor;

class RoleVisitor implements VisitorInterface
{
    /**
     * @var \DesignPattern\Behavioral\Visitor\RoleInterface[]
     */
    private array $roles = [];

    /**
     * @param  \DesignPattern\Behavioral\Visitor\User  $user
     *
     * @return mixed|void
     */
    public function visitUser(User $user)
    {
        $this->roles[] = $user;
    }

    /**
     * @param  \DesignPattern\Behavioral\Visitor\Group  $group
     *
     * @return mixed|void
     */
    public function visitGroup(Group $group)
    {
        $this->roles[] = $group;
    }

    /**
     * @return \DesignPattern\Behavioral\Visitor\RoleInterface[]
     */
    public function getRole(): array
    {
        return $this->roles;
    }
}
