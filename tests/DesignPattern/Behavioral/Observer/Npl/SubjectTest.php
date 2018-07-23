<?php

namespace DesignPattern\Test\Behavioral\Observer;

use DesignPattern\Behavioral\Observer\Npl\Observer;
use DesignPattern\Behavioral\Observer\Npl\Subject;
use DesignPattern\Behavioral\Observer\Npl\SubjectInterface;
use PHPUnit\Framework\TestCase;

class SubjectTest extends TestCase
{
    public function testSubjectInstance()
    {
        $subject = new Subject();
        self::assertInstanceOf(SubjectInterface::class, $subject);
    }

    public function testAttachAndDetachMethod()
    {
        $subject = new Subject();
        $observer = new Observer();
        $observers = &$subject->getObservers();

        self::assertTrue(is_array($observers));
        self::assertFalse(in_array($observer, $observers, true));

        $subject->attach($observer);
        self::assertTrue(in_array($observer, $observers, true));

        $subject->detach($observer);
        self::assertFalse(in_array($observer, $observers, true));
    }

    /**
     * Testing if notify method is called when modifying the subject's author.
     */
    public function testNotify()
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
