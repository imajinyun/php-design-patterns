<?php

namespace DesignPattern\Behavioral\Observer\Spl;

class Product implements \SplSubject
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $price;

    /**
     * @var \SplObjectStorage
     */
    private $observers;

    /**
     * Product constructor.
     *
     * @param string $name
     */
    public function __construct(string $name = '')
    {
        $this->name = $name;
        $this->price = 0;
        $this->observers = new \SplObjectStorage();
    }

    /**
     * Attach an SplObserver.
     *
     * @param \SplObserver $observer
     *
     * @link http://php.net/manual/en/splsubject.attach.php
     */
    public function attach(\SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    /**
     * Detach an observer.
     *
     * @param \SplObserver $observer
     *
     * @link http://php.net/manual/en/splsubject.detach.php
     */
    public function detach(\SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    /**
     * Notify an observer.
     *
     * @link http://php.net/manual/en/splsubject.notify.php
     */
    public function notify()
    {
        /** @var \SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * Get the name for the product.
     *
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Get the price for the product.
     *
     * @return int
     */
    public function getPrice() : int
    {
        return $this->price;
    }

    /**
     * Set the price for the product and notify observers.
     *
     * @param int $price
     */
    public function setPrice(int $price)
    {
        $this->price = $price;

        // Notify the observers about the change
        $this->notify();
    }

    /**
     * @return \SplObjectStorage
     */
    public function getObservers() : \SplObjectStorage
    {
        return $this->observers;
    }
}
