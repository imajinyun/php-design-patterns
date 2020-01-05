<?php

declare(strict_types=1);

namespace DesignPattern\Creational\Builder;

interface BuilderInterface
{
    public function createComputer();

    public function getComputer();

    public function addCPU();

    public function addStorage();

    public function addInput();

    public function addOutput();

    public function addChassis();

    public function addBrand();
}
