<?php

namespace nestorbs;

class Wrapper
{
    public function wrap($word, $columns)
    {
        if (strlen($word) <= $columns) {
            return $word . '\n';
        }
        return (substr($word, 0, $columns)) . '\n' . substr($word, $columns) . '\n';
    }
}
