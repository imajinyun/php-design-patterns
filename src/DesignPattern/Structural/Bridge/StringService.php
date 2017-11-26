<?php

namespace DesignPattern\Structural\Bridge;

class StringService extends Service
{
    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function get() : string
    {
        return $this->formatter->format(time());
    }
}
