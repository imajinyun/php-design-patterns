<?php

namespace DesignPattern\Creational\Pool;

class StringReverseWorker
{
    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * StringReverseWorker constructor.
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * Run string reverse.
     *
     * @param string $text
     *
     * @return string
     */
    public function run(string $text): string
    {
        return strrev($text);
    }
}
