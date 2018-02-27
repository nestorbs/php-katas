<?php

namespace nestorbs;

class PasswordValidator
{
    const MIN_LENGTH = 8;

    public function password($password)
    {
        if ($this->isLongEnough($password) &&
            $this->containsAtLeastOneUppercaseLetter($password) &&
            $this->containsAtLeastOneLowercaseLetter($password)) {
            return true;
        }
        return false;
    }

    private function isLongEnough($password)
    {
        return strlen($password) >= $this::MIN_LENGTH;
    }

    private function containsAtLeastOneUppercaseLetter($password)
    {
        return preg_match('/[A-Z]/', $password) === 1;
    }

    private function containsAtLeastOneLowercaseLetter($password)
    {
        return preg_match('/[a-z]/', $password) === 1;
    }
}
