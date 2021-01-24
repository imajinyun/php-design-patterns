<?php

declare(strict_types=1);

namespace DesignPattern\Structural\Adapter;

class Weibo implements MemberInterface
{
    /**
     * @var int
     */
    private int $number = 0;

    /**
     * Get member token.
     *
     * @param  string  $appId
     * @param  string  $appSecret
     *
     * @return bool
     */
    public function getMemberToken(string $appId, string $appSecret): bool
    {
        $data = ['appId' => $appId, 'appSecret' => $appSecret];
        ksort($data);
        $this->number++;

        return true;
    }

    /**
     * Get login user number.
     *
     * @return int
     */
    public function getLoginMemberNumber(): int
    {
        return $this->number;
    }
}
