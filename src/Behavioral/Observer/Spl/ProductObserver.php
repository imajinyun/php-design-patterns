<?php

declare(strict_types=1);

namespace DesignPattern\Behavioral\Observer\Spl;

class ProductObserver implements \SplObserver
{
    /**
     * Update product price.
     *
     * @param \SplSubject $subject
     *
     * @return void
     */
    public function update(\SplSubject $subject): void
    {
        /** @var \DesignPattern\Behavioral\Observer\Spl\Product $subject */
        echo sprintf('Product has a new price: %d$.', $subject->getPrice());
    }
}
