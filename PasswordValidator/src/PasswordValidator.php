<?php

namespace nestorbs;

class PasswordValidator
{
    const MIN_LENGTH = 8;

    public function password($password)
    {
        if ($this->isLongEnough($password)) {
            return true;
        }
        return false;
    }

    private function isLongEnough($password)
    {
        return strlen($password) >= $this::MIN_LENGTH;
    }
}
