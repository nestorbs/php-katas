<?php

namespace nestorbs;

class Wrapper
{
    public function wrap($word, $columns)
    {
        $lines = '';
        $start = 0;
        while (strlen(substr($word, $start)) > 0) {
            $lines = $lines . substr($word, $start, $columns) . '\n';
            $start = $start + $columns;
        }
        return $lines;
    }
}
