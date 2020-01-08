<?php

declare(strict_types=1);

namespace DesignPattern\More\Repository;

interface RepositoryInterface
{
    public function find(int $id);

    public function save(User $user);

    public function delete(User $user);
}
