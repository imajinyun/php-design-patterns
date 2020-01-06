<?php

declare(strict_types=1);

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
