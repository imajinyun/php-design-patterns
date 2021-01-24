<?php

declare(strict_types=1);

namespace DesignPattern\Behavioral\Visitor;

interface RoleInterface
{
    /**
     * @param  \DesignPattern\Behavioral\Visitor\VisitorInterface  $visitor
     *
     * @return mixed
     */
    public function allow(VisitorInterface $visitor);
}
