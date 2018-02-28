<?php

namespace nestorbs\Test;

use PHPUnit\Framework\TestCase;
use nestorbs\Wrapper;

class WrapperTest extends TestCase
{
    /** @test */
    public function should_return_full_word_when_word_length_is_smaller_than_column()
    {
        $wrapper = new Wrapper();

        $this->assertEquals('Car', $wrapper->wrap('Car', 6));
    }
}
