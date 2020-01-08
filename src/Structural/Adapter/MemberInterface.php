<?php

declare(strict_types=1);

namespace DesignPattern\Structural\Adapter;

interface MemberInterface
{
    /**
     * Get member token.
     *
     * @param string $appId
     * @param string $appSecret
     *
     * @return bool
     */
    public function getMemberToken(string $appId, string $appSecret): bool;

    /**
     * Get login user number.
     *
     * @return int
     */
    public function getLoginMemberNumber(): int;
}
