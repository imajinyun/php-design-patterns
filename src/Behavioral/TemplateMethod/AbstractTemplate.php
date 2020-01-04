<?php

declare(strict_types=1);

namespace DesignPattern\Behavioral\TemplateMethod;

abstract class AbstractTemplate
{
    /**
     * @var array
     */
    private array $toDoThings = [];

    /**
     * This is the public service provided by this class and its subclasses.
     * Notice it is final to "freeze" the global behavior of algorithm.
     *
     * @return void
     */
    final public function run(): void
    {
        $this->toDoThings[] = $this->toPrepare();
        $this->toDoThings[] = $this->toExecute();

        $helper = $this->getHelper();
        if ($helper !== null) {
            $this->toDoThings[] = $helper;
        }

        $this->toDoThings[] = $this->doSomething();
    }

    /**
     * @return array
     */
    public function getToDoThings(): array
    {
        return $this->toDoThings;
    }

    /**
     * @return mixed
     */
    abstract protected function getHelper();

    /**
     * @return string
     */
    private function toPrepare(): string
    {
        return 'Are you ready?';
    }

    /**
     * @return string
     */
    private function toExecute(): string
    {
        return 'The task is executing...';
    }

    /**
     * This method must be implemented, this is the key-feature of this pattern.
     *
     * @return string
     */
    abstract protected function doSomething(): string;
}
