<?php

namespace DesignPattern\YetAnotherMore\Repository;

interface RepositoryInterface
{
    public function find(int $id);

    public function save(User $user);

    public function delete(User $user);
}
