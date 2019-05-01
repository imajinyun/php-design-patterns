<?php

namespace DesignPattern\Test\Creational\Builder;

use DesignPattern\Creational\Builder\Component\Desktop;
use DesignPattern\Creational\Builder\Component\Notebook;
use DesignPattern\Creational\Builder\DesktopBuilder;
use DesignPattern\Creational\Builder\Director;
use DesignPattern\Creational\Builder\NotebookBuilder;
use PHPUnit\Framework\TestCase;

class DirectorTest extends TestCase
{
    public function testCanBuildNotebook(): void
    {
        $builder = new NotebookBuilder();
        $notebook = (new Director())->build($builder);

        self::assertInstanceOf(Notebook::class, $notebook);
    }
}
