<?php

namespace nestorbs\Test;

use PHPUnit\Framework\TestCase;
use nestorbs\Wrapper;

class WrapperTest extends TestCase
{
    protected $wrapper;

    protected function setUp()
    {
        $this->wrapper = new Wrapper();
    }

    /** @test */
    public function should_return_full_word_when_word_length_is_shorter_than_column()
    {
        $this->assertEquals('Car\n', $this->wrapper->wrap('Car', 6));
    }

    /** @test */
    public function should_return_splitted_word_when_word_length_is_longer_than_column()
    {
        $this->assertEquals('Ca\nr\n', $this->wrapper->wrap('Car', 2));
    }

    /** @test */
    public function should_return_one_break_line_per_column_needed()
    {
        $this->assertEquals('to\nbe\nor\n', $this->wrapper->wrap('tobeor', 2));
    }

    /** @test */
    public function should_remove_space_at_the_beginning_of_the_line()
    {
        $this->assertEquals('to\n', $this->wrapper->wrap(' to', 2));
        $this->assertEquals('to\nbe\nor\n', $this->wrapper->wrap('to be or', 2));
    }
}
