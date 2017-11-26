<?php

namespace DesignPattern\Test\Structural\Composite;

use DesignPattern\Structural\Composite\Form;
use DesignPattern\Structural\Composite\InputElement;
use DesignPattern\Structural\Composite\LabelElement;
use DesignPattern\Structural\Composite\TextElement;
use PHPUnit\Framework\TestCase;

class CompositeTest extends TestCase
{
    public function testRender()
    {
        $form = new Form('register.php', 'registerForm');
        $form->addElement(new LabelElement('username', 'Username:'));
        $form->addElement(new InputElement('username'));

        $embed = new Form();
        $embed->addElement(new LabelElement('password', 'Password:'));
        $embed->addElement(new InputElement('password', 'password'));
        $form->addElement($embed);

        $other = new Form();
        $other->addElement(new LabelElement('phone', 'Phone:'));
        $other->addElement(new InputElement('phone', 'number'));
        $form->addElement($other);

        self::assertEquals($this->getExpectedFormElement(), $form->render());
    }

    private function getExpectedFormElement()
    {
        $expected = '';
        $expected .= '<form action="register.php" name="registerForm">';
        $expected .= '<label for="username">Username:</label>';
        $expected .= '<input type="text" name="username">';
        $expected .= '<label for="password">Password:</label>';
        $expected .= '<input type="password" name="password">';
        $expected .= '<label for="phone">Phone:</label>';
        $expected .= '<input type="number" name="phone">';
        $expected .= '</form>';

        return $expected;
    }
}
