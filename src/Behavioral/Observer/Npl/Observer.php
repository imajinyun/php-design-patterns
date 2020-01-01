<?php

declare(strict_types=1);

namespace DesignPattern\Behavioral\Observer\Npl;

class Observer implements ObserverInterface
{
    /**
     * Receive update from subject.
     *
     * @param \DesignPattern\Behavioral\Observer\Npl\SubjectInterface $subject
     *
     * @return mixed|void
     */
    public function update(SubjectInterface $subject)
    {
        echo sprintf('Subject author is %s.', $subject->getAuthor());
    }

    /**
     * Report something.
     *
     * @param int $code
     * @param string $message
     * @param \DesignPattern\Behavioral\Observer\Npl\SubjectInterface $subject
     *
     * @return mixed|void
     */
    public function report(
        int $code,
        string $message,
        SubjectInterface $subject
    ) {
        // TODO: Implement report() method.
    }
}
