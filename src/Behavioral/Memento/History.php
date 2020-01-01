<?php

declare(strict_types=1);

namespace DesignPattern\Behavioral\Memento;

class History implements \Countable
{
    /**
     * @var \DesignPattern\Behavioral\Memento\Memento[]
     */
    private array $mementos;

    /**
     * History constructor.
     */
    public function __construct()
    {
        $this->mementos = [];
    }

    /**
     * Add to memento.
     *
     * @param \DesignPattern\Behavioral\Memento\Memento $memento
     */
    public function addMemento(Memento $memento): void
    {
        $this->mementos[] = $memento;
    }

    /**
     * Popup from memento.
     *
     * @return \DesignPattern\Behavioral\Memento\Memento|mixed|null
     */
    public function popMemento()
    {
        if ($this->count() > 0) {
            return array_pop($this->mementos);
        }

        return null;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->mementos);
    }
}
