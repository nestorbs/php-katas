<?php

namespace nestorbs\Test;

use PHPUnit\Framework\TestCase;
use nestorbs\PasswordValidator;

class PasswordValidatorTest extends TestCase
{
    public function testIsLongEnough()
    {
        $passwordValidator = new PasswordValidator();

        $this->assertTrue($passwordValidator->password('Aa00000'));
    }
}
