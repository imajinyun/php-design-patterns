<?php

namespace DesignPattern\More\ServiceLocator;

class ServiceLocator
{
    /**
     * @var array
     */
    private $services = [];

    /**
     * @var array
     */
    private $instantiated = [];

    /**
     * @var array
     */
    private $shared = [];

    /**
     * Add instance.
     *
     * @param string $class
     * @param \DesignPattern\More\ServiceLocator\RequestService|
     *        \DesignPattern\More\ServiceLocator\ResponseService $service
     * @param bool   $isShare
     *
     * @return void
     */
    public function addInstance(
        string $class,
        $service,
        bool $isShare = true
    ): void {
        $this->services[$class] = $service;
        $this->instantiated[$class] = $service;
        $this->shared[$class] = $isShare;
    }

    /**
     * Add class.
     *
     * @param string $class
     * @param array  $parameter
     * @param bool   $isShare
     *
     * @return void
     */
    public function addClass(
        string $class,
        array $parameter,
        bool $isShare = false
    ): void {
        $this->services[$class] = $parameter;
        $this->shared[$class] = $isShare;
    }

    /**
     * @param string $class
     *
     * @return bool
     */
    public function has(string $class): bool
    {
        return isset($this->services[$class]) || isset($this->instantiated[$class]);
    }

    /**
     * Get a new instance.
     *
     * @param string $class
     *
     * @return mixed
     * @throws \OutOfRangeException
     */
    public function get(string $class)
    {
        if (isset($this->instantiated[$class]) && $this->shared[$class]) {
            return $this->instantiated[$class];
        }

        $object = $this->getInstance($class);

        if ($this->shared[$class]) {
            $this->instantiated[$class] = $object;
        }

        return $object;
    }

    /**
     * Get an instance.
     *
     * @param string $class
     *
     * @return \DesignPattern\YetAnotherMore\ServiceLocator\ServiceInterface
     * @throws \OutOfRangeException
     */
    private function getInstance(string $class): ServiceInterface
    {
        $args = $this->services[$class];
        switch (\count($args)) {
            case 0:
                $object = new $class();
                break;
            case 1:
                $object = new $class($args[0]);
                break;
            case 2:
                $object = new $class($args[0], $args[1]);
                break;
            default:
                throw new \OutOfRangeException('Too many arguments given.');
        }

        return $object;
    }
}
