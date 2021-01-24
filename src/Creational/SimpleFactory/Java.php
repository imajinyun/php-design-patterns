<?php

declare(strict_types=1);

namespace DesignPattern\Creational\SimpleFactory;

class Java implements LanguageInterface
{
    /**
     * Java language write application.
     *
     * @param  string  $language
     *
     * @return string
     */
    public function toWriteApplication(string $language): string
    {
        $language = ucfirst($language);

        return "using $language language to write application.";
    }
}
