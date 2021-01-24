<?php

declare(strict_types=1);

namespace DesignPattern\Structural\Adapter;

class UserAdapter implements UserInterface
{
    /**
     * @var \DesignPattern\Structural\Adapter\MemberInterface
     */
    private MemberInterface $member;

    /**
     * UserAdapter constructor.
     *
     * @param  \DesignPattern\Structural\Adapter\MemberInterface  $member
     */
    public function __construct(MemberInterface $member)
    {
        $this->member = $member;
    }

    /**
     * User login.
     *
     * @param  string  $appId
     * @param  string  $appSecret
     *
     * @return bool
     */
    public function login(string $appId, string $appSecret): bool
    {
        $this->member->getMemberToken($appId, $appSecret);

        return true;
    }

    /**
     * Get login user number.
     *
     * @return int
     */
    public function getLoginUserNumber(): int
    {
        return $this->member->getLoginMemberNumber();
    }
}
