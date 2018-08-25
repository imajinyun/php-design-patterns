<?php

namespace DesignPattern\Structural\DataMapper;

class Repository
{
    /**
     * @var array
     */
    private $data;

    /**
     * Repository constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Find user info.
     *
     * @param int $id
     *
     * @return mixed|null
     */
    public function find(int $id)
    {
        if (isset($this->data[$id])) {
            return $this->data[$id];
        }

        return null;
    }
}
