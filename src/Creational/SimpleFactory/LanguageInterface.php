<?php

namespace DesignPattern\Creational\SimpleFactory;

interface LanguageInterface
{
    /**
     * Write application's language.
     *
     * @param string $language
     *
     * @return string
     */
    public function toWriteApplication(string $language): string;
}
