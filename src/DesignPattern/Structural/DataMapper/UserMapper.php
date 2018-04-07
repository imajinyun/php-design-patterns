<?php

namespace DesignPattern\Structural\DataMapper;

class UserMapper
{
    /**
     * @var \DesignPattern\Structural\DataMapper\Repository
     */
    private $repository;

    /**
     * UserMapper constructor.
     *
     * @param \DesignPattern\Structural\DataMapper\Repository $repository
     */
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Find user by Id.
     *
     * @param int $id
     *
     * @throws \InvalidArgumentException
     * @return mixed
     */
    public function findById(int $id)
    {
        $result = $this->repository->find($id);

        if ($result === null) {
            throw new \InvalidArgumentException("User #$id not found.", $id);
        }

        return $this->mapRowToUser($result);
    }

    /**
     * Map row table.
     *
     * @param array $row
     *
     * @return \DesignPattern\Structural\DataMapper\User
     */
    private function mapRowToUser(array $row): User
    {
        return User::fromState($row);
    }
}
