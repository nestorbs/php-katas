<?php

namespace nestorbs;

class Wrapper
{
    public function wrap($word, $columns)
    {
        $lines = '';
        $start = 0;
        while (strlen(substr($this->removeBeginningSpace($word), $start)) > 0) {
            $lines = $lines . substr($this->removeBeginningSpace($word), $start, $columns) . '\n';
            $start = $start + $columns;
        }
        return $lines;
    }

    private function removeBeginningSpace($word)
    {
        if (strpos($word, ' ') === 0) {
            return substr($word, 1);
        }
        return $word;
    }
}
