<?php

namespace DesignPattern\Behavioral\Visitor;

class User implements RoleInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * User constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName(): string
    {
        return sprintf('User: %s', $this->name);
    }

    /**
     * @param \DesignPattern\Behavioral\Visitor\VisitorInterface $visitor
     *
     * @return mixed|void
     */
    public function allow(VisitorInterface $visitor)
    {
        $visitor->visitUser($this);
    }
}
