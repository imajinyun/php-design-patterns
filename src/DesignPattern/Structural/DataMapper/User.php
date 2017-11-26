<?php

namespace DesignPattern\Structural\DataMapper;

class User
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $email;

    /**
     * User constructor.
     *
     * @param string $username
     * @param string $email
     */
    public function __construct(string $username, string $email)
    {
        $this->username = $username;
        $this->email = $email;
    }

    /**
     * From state.
     *
     * @param array $state
     *
     * @return \DesignPattern\Structural\DataMapper\User
     */
    public static function fromState(array $state) : User
    {
        return new self($state['username'], $state['email']);
    }

    /**
     * Get username.
     *
     * @return string
     */
    public function getUsername() : string
    {
        return $this->username;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail() : string
    {
        return $this->email;
    }
}
