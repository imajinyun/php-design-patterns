<?php

namespace DesignPattern\Creational\SimpleFactory;

class Swift implements LanguageInterface
{
    /**
     * Swift language write application.
     *
     * @param string $language
     *
     * @return string
     */
    public function toWriteApplication(string $language) : string
    {
        $language = ucfirst($language);

        return "using $language language to write application.";
    }
}
