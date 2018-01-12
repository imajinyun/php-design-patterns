<?php

namespace DesignPattern\Creational\SimpleFactory;

class SimpleFactory
{
    /**
     * @var array
     */
    protected $language = [];

    /**
     * SimpleFactory constructor.
     */
    public function __construct()
    {
        $this->language = [
            'java'  => __NAMESPACE__ . '\\Java',
            'swift' => __NAMESPACE__ . '\\Swift',
        ];
    }

    /**
     * Create an object.
     *
     * @param string $language
     *
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function create(string $language) : LanguageInterface
    {
        if (! array_key_exists($language, $this->language)) {
            throw new \InvalidArgumentException("$language is not valid programming language.");
        }
        $class = $this->language[$language];

        return new $class();
    }
}
