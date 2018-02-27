<?php

namespace nestorbs\Test;

use PHPUnit\Framework\TestCase;
use nestorbs\PasswordValidator;

class PasswordValidatorTest extends TestCase
{
    protected $passwordValidator;

    protected function setUp()
    {
        $this->passwordValidator = new PasswordValidator();
    }

    public function testIsLongEnough()
    {
        $this->assertTrue($this->passwordValidator->password('Aa000000'));
    }

    public function testShouldBeAtLeastEightCharactersLong()
    {
        $this->assertFalse($this->passwordValidator->password('aaa0000'));
    }
}
