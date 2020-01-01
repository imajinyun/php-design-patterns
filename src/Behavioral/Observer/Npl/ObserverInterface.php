<?php

declare(strict_types=1);

namespace DesignPattern\Behavioral\Observer\Npl;

interface ObserverInterface
{
    /**
     * Receive update from subject.
     *
     * @param \DesignPattern\Behavioral\Observer\Npl\SubjectInterface $subject
     *
     * @return mixed
     */
    public function update(SubjectInterface $subject);

    /**
     * @param int $code
     * @param string $message
     * @param \DesignPattern\Behavioral\Observer\Npl\SubjectInterface $subject
     *
     * @return mixed
     */
    public function report(
        int $code,
        string $message,
        SubjectInterface $subject
    );
}
