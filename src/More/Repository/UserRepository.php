<?php

namespace DesignPattern\More\Repository;

class UserRepository implements RepositoryInterface
{
    /**
     * @var \DesignPattern\More\Repository\MemoryStorage
     */
    private $storage;

    /**
     * UserRepository constructor.
     *
     * @param \DesignPattern\More\Repository\MemoryStorage $storage
     */
    public function __construct(MemoryStorage $storage)
    {
        $this->storage = $storage;
    }

    /**
     * Find user by ID.
     *
     * @param int $id
     *
     * @return \DesignPattern\More\Repository\User
     *
     * @throws \InvalidArgumentException
     */
    public function find(int $id): User
    {
        $array = $this->storage->read($id);

        if ($array === null) {
            $message = sprintf('User with ID #%d does not exist.', $id);
            throw new \InvalidArgumentException($message);
        }

        return User::arrayToObject($array);
    }

    /**
     * @param \DesignPattern\More\Repository\User $user
     *
     * @return void
     */
    public function save(User $user): void
    {
        $id = $this->storage->write(
            [
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
            ]
        );

        $user->setId($id);
    }

    /**
     * @param \DesignPattern\More\Repository\User $user
     *
     * @return void
     */
    public function delete(User $user): void
    {
        $this->storage->delete($user->getId());
    }
}
