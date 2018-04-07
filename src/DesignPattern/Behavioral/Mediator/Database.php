<?php

namespace DesignPattern\Behavioral\Mediator;

class Database extends AbstractColleague
{
    /**
     * Query some data.
     *
     * @return string
     */
    public function query(): string
    {
        return 'World!';
    }
}
