<?php

namespace DesignPattern\Structural\Proxy;

class Employee
{
    /**
     * No access to WiFi.
     */
    public const ACCESS_LEVEL_DENY = 0;

    /**
     * Access granted to WiFi.
     */
    public const ACCESS_LEVEL_ALLOW = 1;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var int
     */
    protected $accessLevel;

    /**
     * Employee constructor.
     *
     * @param string $username
     * @param string $password
     * @param int $accessLevel
     */
    public function __construct(
        string $username,
        string $password,
        int $accessLevel
    )
    {
        $this->username = $username;
        $this->password = $password;
        $this->accessLevel = $accessLevel;
    }

    /**
     * Get access level.
     *
     * @return int
     */
    public function getAccessLevel(): int
    {
        return $this->accessLevel;
    }
}
