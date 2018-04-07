<?php

namespace DesignPattern\Behavioral\Observer\Npl;

class Subject implements SubjectInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $author;

    /**
     * @var array
     */
    private $observers;

    /**
     * Subject constructor.
     *
     * @param string $name
     */
    public function __construct(string $name = '')
    {
        $this->name = $name;
        $this->observers = [];
    }

    /**
     * Attach an SplObserver.
     *
     * @param \DesignPattern\Behavioral\Observer\Npl\ObserverInterface $observer
     */
    public function attach(ObserverInterface $observer)
    {
        if (! \in_array($observer, $this->observers, true)) {
            $this->observers[] = $observer;
        }
    }

    /**
     * Detach an observer.
     *
     * @param \DesignPattern\Behavioral\Observer\Npl\ObserverInterface $observer
     */
    public function detach(ObserverInterface $observer)
    {
        $key = array_search($observer, $this->observers, true);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    /**
     * Notify an observer.
     */
    public function notify()
    {
        /** @var \DesignPattern\Behavioral\Observer\Npl\Observer $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * Report an observer.
     *
     * @throws \Exception
     */
    public function doSomethingReport()
    {
        /** @var \DesignPattern\Behavioral\Observer\Npl\Observer $observer */
        foreach ($this->observers as $observer) {
            $observer->report(random_int(20, 29), 'Something happened.', $this);
        }
    }

    /**
     * Get the name for the subject.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the author for the subject.
     *
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * Set the author for the subject and notify observers.
     *
     * @param string $author
     */
    public function setAuthor(string $author)
    {
        $this->author = $author;

        // notify the observers about the change
        $this->notify();
    }

    /**
     * Get observers.
     *
     * @return array
     */
    public function &getObservers(): array
    {
        return $this->observers;
    }
}
