<?php

namespace nestorbs;

class Wrapper
{
    public function wrap($word, $columns)
    {
        return substr($word, 0, $columns) . '\n' . substr($word, $columns);
    }
}
