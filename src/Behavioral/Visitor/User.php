<?php

declare(strict_types=1);

namespace DesignPattern\Behavioral\Visitor;

class User implements RoleInterface
{
    /**
     * @var string
     */
    private string $name;

    /**
     * User constructor.
     *
     * @param  string  $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Get user name.
     *
     * @return string
     */
    public function getName(): string
    {
        return sprintf('User: %s', $this->name);
    }

    /**
     * @param  \DesignPattern\Behavioral\Visitor\VisitorInterface  $visitor
     *
     * @return mixed|void
     */
    public function allow(VisitorInterface $visitor)
    {
        $visitor->visitUser($this);
    }
}
