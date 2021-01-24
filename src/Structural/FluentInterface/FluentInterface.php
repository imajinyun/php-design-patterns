<?php

declare(strict_types=1);

namespace DesignPattern\Structural\FluentInterface;

interface FluentInterface
{
    /**
     * Select sentence.
     *
     * @param  array  $field
     *
     * @return mixed
     */
    public function select(array $field);

    /**
     * Table sentence.
     *
     * @param  string  $table
     * @param  string  $alias
     *
     * @return mixed
     */
    public function from(string $table, string $alias = '');

    /**
     * Where sentence.
     *
     * @param  string  $condition
     *
     * @return mixed
     */
    public function where(string $condition);
}
