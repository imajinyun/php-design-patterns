<?php

namespace DesignPattern\Test\Behavioral\Observer;

use DesignPattern\Behavioral\Observer\Npl\Observer;
use DesignPattern\Behavioral\Observer\Npl\ObserverInterface;
use DesignPattern\Behavioral\Observer\Npl\Subject;
use DesignPattern\Behavioral\Observer\Npl\SubjectInterface;
use PHPUnit\Framework\TestCase;

class ObserverTest extends TestCase
{
    public function testSubjectObserverInstance()
    {
        $observer = new Observer();
        self::assertInstanceOf(ObserverInterface::class, $observer);
    }

    public function testObserverIsUpdated()
    {
        $mock = $this->createMock(Observer::class);
        $mock->expects($this->once())
             ->method('update')
             ->with(self::isInstanceOf(SubjectInterface::class));

        $subject = new Subject('My Subject');
        $subject->attach($mock);
        $subject->notify();
    }

    public function testObserverReported()
    {
        $observer = $this->getMockBuilder(Observer::class)
                         ->setMethods(['report'])
                         ->getMock();

        $observer->expects($this->once())
                 ->method('report')
                 ->with(
                     self::greaterThan(0),
                     self::stringContains('something'),
                     self::callback(function ($subject) {
                         return \is_callable([$subject, 'getName'])
                             && $subject->getName() == 'My Subject';
                     })
                 );

        $subject = new Subject('My Subject');
        $subject->attach($observer);
        $subject->doSomethingReport();
    }
}
