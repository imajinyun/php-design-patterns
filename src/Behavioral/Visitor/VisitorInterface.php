<?php

declare(strict_types=1);

namespace DesignPattern\Behavioral\Visitor;

interface VisitorInterface
{
    /**
     * @param \DesignPattern\Behavioral\Visitor\User $user
     *
     * @return mixed
     */
    public function visitUser(User $user);

    /**
     * @param \DesignPattern\Behavioral\Visitor\Group $group
     *
     * @return mixed
     */
    public function visitGroup(Group $group);
}
