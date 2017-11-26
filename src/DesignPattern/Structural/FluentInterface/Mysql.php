<?php

namespace DesignPattern\Structural\FluentInterface;

class Mysql implements FluentInterface
{
    /**
     * @var array
     */
    private $fields;

    /**
     * @var array
     */
    private $table;

    /**
     * @var array
     */
    private $conditions;

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            'SELECT %s FROM %s WHERE %s',
            implode(',', $this->fields),
            implode(', ', $this->table),
            implode(' AND ', $this->conditions)
        );
    }

    /**
     * Select.
     *
     * @param array $fields
     *
     * @return $this
     */
    public function select(array $fields)
    {
        $this->fields = $fields;

        return $this;
    }

    /**
     * Table.
     *
     * @param string $table
     * @param string $alias
     *
     * @return $this
     */
    public function from(string $table, string $alias = '')
    {
        $this->table[] = $alias ? sprintf('%s AS %s', $table, $alias) : $table;

        return $this;
    }

    /**
     * Where.
     *
     * @param string $conditions
     *
     * @return $this
     */
    public function where(string $conditions)
    {
        $this->conditions[] = $conditions;

        return $this;
    }
}
