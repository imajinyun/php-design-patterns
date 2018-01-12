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
     * @param int $id
     *
     * @return \DesignPattern\YetAnotherMore\Repository\User
     * @throws \OutOfRangeException|\InvalidArgumentException
     */
    public function find(int $id) : User
    {
        $array = $this->storage->read($id);

        if ($array === null) {
            throw new \InvalidArgumentException(sprintf('User with ID #%d does not exist.',
                $id));
        }

        return User::arrayToObject($array);
    }

    /**
     * @param \DesignPattern\YetAnotherMore\Repository\User $user
     *
     * @return void
     */
    public function save(User $user) : void
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
     * @return void
     * @throws \OutOfRangeException
     */
    public function delete(User $user) : void
    {
        $this->storage->delete($user->getId());
    }
}
