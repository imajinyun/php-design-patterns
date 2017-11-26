<?php

namespace DesignPattern\YetAnotherMore\Repository;

class UserRepository implements RepositoryInterface
{
    /**
     * @var \DesignPattern\YetAnotherMore\Repository\MemoryStorage
     */
    private $storage;

    /**
     * UserRepository constructor.
     *
     * @param \DesignPattern\YetAnotherMore\Repository\MemoryStorage $storage
     */
    public function __construct(MemoryStorage $storage)
    {
        $this->storage = $storage;
    }

    /**
     * Find user by ID.
     *
     * @param $id
     *
     * @return \DesignPattern\YetAnotherMore\Repository\User
     * @throws \InvalidArgumentException
     */
    public function find(int $id) : User
    {
        $array = $this->storage->read($id);

        if ($array === null) {
            throw new \InvalidArgumentException(sprintf('User with ID #%d does not exist.', $id));
        }

        return User::arrayToObject($array);
    }

    /**
     * @param \DesignPattern\YetAnotherMore\Repository\User $user
     */
    public function save(User $user)
    {
        $id = $this->storage->write([
            'username' => $user->getUsername(),
            'email'    => $user->getEmail(),
        ]);

        $user->setId($id);
    }

    /**
     * @param \DesignPattern\YetAnotherMore\Repository\User $user
     *
     * @throws \OutOfRangeException
     */
    public function delete(User $user)
    {
        return $this->storage->delete($user->getId());
    }
}
