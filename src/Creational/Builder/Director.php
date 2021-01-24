<?php

declare(strict_types=1);

namespace DesignPattern\Creational\Builder;

class Director
{
    /**
     * Builder.
     *
     * @param  \DesignPattern\Creational\Builder\BuilderInterface  $builder
     *
     * @return mixed
     */
    public function build(BuilderInterface $builder)
    {
        $builder->createComputer();
        $builder->addCPU();
        $builder->addStorage();
        $builder->addInput();
        $builder->addOutput();
        $builder->addChassis();
        $builder->addBrand();

        return $builder->getComputer();
    }
}
