<?php

namespace DesignPattern\Behavioral\Memento;

class State
{
    const STATUS_LOCKED = 1;
    const STATUS_CONFIRMED = 2;
    const STATUS_PAID = 3;
    const STATUS_SHIPPED = 4;
    const STATUS_SETTLED = 5;
    const STATUS_COMPLETED = 6;
    const STATUS_CANCELED = 7;

    /**
     * @var int
     */
    private $state;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var array
     */
    private static $validStates = [
        self::STATUS_LOCKED,
        self::STATUS_CONFIRMED,
        self::STATUS_PAID,
        self::STATUS_SHIPPED,
        self::STATUS_SETTLED,
        self::STATUS_COMPLETED,
        self::STATUS_CANCELED,
    ];

    /**
     * State constructor.
     *
     * @param int $state
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($state = self::STATUS_LOCKED)
    {
        self::isValidState($state);

        $this->state = $state;
        $this->createdAt = new \DateTime('now');
    }

    /**
     * Check state.
     *
     * @param int $state
     *
     * @throws \InvalidArgumentException When state is not set.
     */
    private static function isValidState(int $state)
    {
        if (!in_array($state, self::$validStates, true)) {
            throw new \InvalidArgumentException('Invalid state given.');
        }
    }
}
