<?php

namespace nestorbs;

class Wrapper
{
    public function wrap($word, $columns)
    {
        if (strlen($word) <= $columns) {
            return $word . '\n';
        }
        $line = substr($word, 0, $columns) . '\n';
        $start = $columns;
        while (strlen(substr($word, $start)) > 0) {
            $line = $line . substr($word, $start, $columns) . '\n';
            $start = $start + $columns;
        }
        return $line;
    }
}
