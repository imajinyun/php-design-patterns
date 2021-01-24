<?php

declare(strict_types=1);

namespace DesignPattern\Structural\Bridge;

abstract class Service
{
    /**
     * @var \DesignPattern\Structural\Bridge\FormatterInterface
     */
    protected FormatterInterface $formatter;

    /**
     * Service constructor.
     *
     * @param  \DesignPattern\Structural\Bridge\FormatterInterface  $formatter
     */
    public function __construct(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * @param  \DesignPattern\Structural\Bridge\FormatterInterface  $formatter
     *
     * @return void
     */
    public function setFormatter(FormatterInterface $formatter): void
    {
        $this->formatter = $formatter;
    }

    /**
     * @return string
     */
    abstract public function get(): string;
}
