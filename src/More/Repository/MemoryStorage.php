<?php

namespace DesignPattern\More\Repository;

class MemoryStorage
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var int
     */
    private $lastIndex = 0;

    /**
     * Read data from memory.
     *
     * @param int $id
     *
     * @return array
     * @throws \OutOfRangeException
     */
    public function read(int $id): array
    {
        $this->validate($id);

        return $this->data[$id];
    }

    /**
     * Write data to memory.
     *
     * @param array $data
     *
     * @return int
     */
    public function write(array $data): int
    {
        $this->lastIndex++;
        $data['id'] = $this->lastIndex;
        $this->data[$this->lastIndex] = $data;

        return $this->lastIndex;
    }

    /**
     * Delete data from memory.
     *
     * @param int $id
     *
     * @return void
     * @throws \OutOfRangeException
     */
    public function delete(int $id): void
    {
        $this->validate($id);

        unset($this->data[$id]);
    }

    /**
     * Check if ID exists.
     *
     * @param int $id
     *
     * @return void
     * @throws \OutOfRangeException
     */
    private function validate(int $id): void
    {
        if (!isset($this->data[$id])) {
            throw new \OutOfRangeException(sprintf('Data for ID #%d is not found.',
                $id));
        }
    }
}
