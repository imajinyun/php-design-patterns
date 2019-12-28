<?php
declare(strict_types=1);

namespace DesignPattern\Behavioral\Memento;

class State
{
    public const STATUS_LOCKED = 1;
    public const STATUS_CONFIRMED = 2;
    public const STATUS_PAID = 3;
    public const STATUS_SHIPPED = 4;
    public const STATUS_SETTLED = 5;
    public const STATUS_COMPLETED = 6;
    public const STATUS_CANCELED = 7;

    /**
     * @var int
     */
    private int $state;


    /**
     * @var \DateTime
     */
    private \DateTime $createdAt;

    /**
     * @var array
     */
    private static array $validStates = [
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
     * @throws \Exception|\InvalidArgumentException
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
     * @return void
     *
     * @throws \InvalidArgumentException When state is not set.
     */
    private static function isValidState(int $state): void
    {
        if (! in_array($state, self::$validStates, true)) {
            throw new \InvalidArgumentException('Invalid state given.');
        }
    }
}
