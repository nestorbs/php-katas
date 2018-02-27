<?php

namespace nestorbs\Test;

use PHPUnit\Framework\TestCase;
use nestorbs\PasswordValidator;

class PasswordValidatorTest extends TestCase
{
    public function testIsLongEnough()
    {
        $passwordValidator = new PasswordValidator();

        $this->assertTrue($passwordValidator->password('Aa000000'));
    }

    public function testShouldBeAtLeastEightCharactersLong()
    {
        $passwordValidator = new PasswordValidator();

        $this->assertFalse($passwordValidator->password('aaa0000'));
    }
}
