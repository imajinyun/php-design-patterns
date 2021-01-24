<?php

declare(strict_types=1);

namespace DesignPattern\Structural\Adapter;

class User implements UserInterface
{
    /**
     * @var int
     */
    private int $number = 0;

    /**
     * User login.
     *
     * @param  string  $username
     * @param  string  $password
     *
     * @return bool
     */
    public function login(string $username, string $password): bool
    {
        $data = ['username' => $username, 'password' => $password];
        ksort($data);
        $this->number++;

        return true;
    }

    /**
     * Get login user number.
     *
     * @return int
     */
    public function getLoginUserNumber(): int
    {
        return $this->number;
    }
}
