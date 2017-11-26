<?php

namespace DesignPattern\Behavioral\Visitor;

interface RoleInterface
{
    /**
     * @param \DesignPattern\Behavioral\Visitor\VisitorInterface $visitor
     *
     * @return mixed
     */
    public function allow(VisitorInterface $visitor);
}
