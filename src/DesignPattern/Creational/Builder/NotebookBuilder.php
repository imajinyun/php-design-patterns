<?php

namespace DesignPattern\Creational\Builder;

use DesignPattern\Creational\Builder\Component\Brand;
use DesignPattern\Creational\Builder\Component\Chassis;
use DesignPattern\Creational\Builder\Component\CPU;
use DesignPattern\Creational\Builder\Component\Input;
use DesignPattern\Creational\Builder\Component\Notebook;
use DesignPattern\Creational\Builder\Component\Output;
use DesignPattern\Creational\Builder\Component\Storage;

class NotebookBuilder implements BuilderInterface
{
    /**
     * @var \DesignPattern\Creational\Builder\Component\Notebook
     */
    private $notebook;

    /**
     * Create notebook computer.
     */
    public function createComputer()
    {
        $this->notebook = new Notebook();
    }

    /**
     * @return \DesignPattern\Creational\Builder\Component\Notebook
     */
    public function getComputer() : Notebook
    {
        return $this->notebook;
    }

    public function addCPU()
    {
        $this->notebook->setComponent('Intel', new CPU());
    }

    public function addStorage()
    {
        $this->notebook->setComponent('Kingston', new Storage());
        $this->notebook->setComponent('Seagate', new Storage());
    }

    public function addInput()
    {
        $this->notebook->setComponent('Logitech', new Input());
    }

    public function addOutput()
    {
        $this->notebook->setComponent('Samsung', new Output());
    }

    public function addChassis()
    {
        $this->notebook->setComponent('Aigo', new Chassis());
    }

    public function addBrand()
    {
        $this->notebook->setComponent('Lenovo', new Brand());
    }
}
