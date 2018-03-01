<?php

namespace nestorbs;

class Wrapper
{
    public function wrap($word, $columns)
    {
        $lines = '';
        $words = $this->removeBeginningSpace($word);
        while (strlen($words) > 0) {
            $lines = $lines . substr($words, 0, $columns) . '\n';
            $words = $this->removeBeginningSpace(substr($words, $columns));
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
