<?php

namespace nestorbs\Test;

use PHPUnit\Framework\TestCase;
use nestorbs\Wrapper;

class WrapperTest extends TestCase
{
    /** @test */
    public function should_return_full_word_when_word_length_is_shorter_than_column()
    {
        $wrapper = new Wrapper();

        $this->assertEquals('Car\n', $wrapper->wrap('Car', 6));
    }

    /** @test */
    public function should_return_splitted_word_when_word_length_is_longer_than_column()
    {
        $wrapper = new Wrapper();

        $this->assertEquals('Ca\nr\n', $wrapper->wrap('Car', 2));
    }

    /** @test */
    public function should_return_one_break_line_per_column_needed()
    {
        $wrapper = new Wrapper();

        $this->assertEquals('to\nbe\nor\n', $wrapper->wrap('tobeor', 2));
    }

    /** @test */
    public function should_remove_space_at_the_beginning_of_the_line()
    {
        $wrapper = new Wrapper();

        $this->assertEquals('to\n', $wrapper->wrap(' to', 2));
    }
}
