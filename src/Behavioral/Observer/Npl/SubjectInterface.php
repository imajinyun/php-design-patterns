<?php
declare(strict_types=1);

namespace DesignPattern\Behavioral\Observer\Npl;

interface SubjectInterface
{
    /**
     * Attach an ObserverInterface.
     *
     * @param \DesignPattern\Behavioral\Observer\Npl\ObserverInterface $observer
     *
     * @return mixed
     */
    public function attach(ObserverInterface $observer);

    /**
     * Detach an observer.
     *
     * @param \DesignPattern\Behavioral\Observer\Npl\ObserverInterface $observer
     *
     * @return mixed
     */
    public function detach(ObserverInterface $observer);

    /**
     * Notify an observer.
     *
     * @return mixed
     */
    public function notify();
}
