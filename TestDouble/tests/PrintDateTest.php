<?php

namespace nestorbs;

use PHPUnit\Framework\TestCase;

function date($format)
{
    return '2018-03-11 12:19:45';
}

class PrintDateTest extends TestCase
{
    /** @test */
    public function should_return_current_date()
    {
        $currentDate = new PrintDateSpy();

        $currentDate->printCurrentDate();

        $this->assertTrue($currentDate->dateWasCalled());
    }

    /** @test */
    public function should_print_date()
    {
        $currentDate = new PrintDate();

        $currentDate->printCurrentDate();

        $this->expectOutputString('2018-03-11 12:19:45');
    }
}
