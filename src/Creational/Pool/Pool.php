<?php

declare(strict_types=1);

namespace DesignPattern\Creational\Pool;

class Pool implements \Countable
{
    /**
     * @var array StringReverseWorker[]
     */
    private array $usedWorker = [];

    /**
     * @var array StringReverseWorker[]
     */
    private array $freeWorker = [];

    /**
     * Get worker.
     *
     * @return \DesignPattern\Creational\Pool\StringReverseWorker
     */
    public function get(): StringReverseWorker
    {
        if (count($this->freeWorker) === 0) {
            $worker = new StringReverseWorker();
        } else {
            $worker = array_pop($this->freeWorker);
        }

        $this->usedWorker[spl_object_hash($worker)] = $worker;

        return $worker;
    }

    /**
     * Dispose worker.
     *
     * @param \DesignPattern\Creational\Pool\StringReverseWorker $worker
     */
    public function dispose(StringReverseWorker $worker): void
    {
        $key = spl_object_hash($worker);

        if (isset($this->usedWorker[$key])) {
            unset($this->usedWorker[$key]);
            $this->freeWorker[$key] = $worker;
        }
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->usedWorker) + count($this->freeWorker);
    }
}
