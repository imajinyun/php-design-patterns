<?php

namespace DesignPattern\Test\Behavioral\Observer;

use DesignPattern\Behavioral\Observer\Npl\Observer;
use DesignPattern\Behavioral\Observer\Npl\Subject;
use DesignPattern\Behavioral\Observer\Npl\SubjectInterface;
use PHPUnit\Framework\TestCase;

class SubjectTest extends TestCase
{
    public function testSubjectInstance(): void
    {
        $subject = new Subject();
        self::assertInstanceOf(SubjectInterface::class, $subject);
    }

    public function testAttachAndDetachMethod(): void
    {
        $subject = new Subject();
        $observer = new Observer();
        $observers = &$subject->getObservers();

        self::assertIsArray($observers);
        self::assertNotContains($observer, $observers);

        $subject->attach($observer);
        self::assertIsArray($observers);

        $subject->detach($observer);
        self::assertNotContains($observer, $observers);
    }

    /**
     * Testing if notify method is called when modifying the subject's author.
     */
    public function testNotify(): void
    {
        $mock = $this->getMockBuilder(Subject::class)
            ->setMethods(['notify'])
            ->getMock();

        $mock->expects($this->once())
            ->method('notify');

        /** @var Subject $mock */
        $mock->setAuthor('Jack');
    }
}
