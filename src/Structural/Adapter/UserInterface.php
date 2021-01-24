<?php

declare(strict_types=1);

namespace DesignPattern\Structural\Adapter;

interface UserInterface
{
    /**
     * Login.
     *
     * @param  string  $username
     * @param  string  $password
     *
     * @return bool
     */
    public function login(string $username, string $password): bool;

    /**
     * Get login user number.
     *
     * @return int
     */
    public function getLoginUserNumber(): int;
}
