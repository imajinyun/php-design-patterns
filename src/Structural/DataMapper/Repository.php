<?php

declare(strict_types=1);

namespace DesignPattern\Structural\DataMapper;

class Repository
{
    /**
     * @var array
     */
    private array $data;

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
        return $this->data[$id] ?? null;
    }
}
