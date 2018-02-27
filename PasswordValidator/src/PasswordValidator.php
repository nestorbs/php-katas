<?php

namespace nestorbs;

class PasswordValidator
{
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
        $minLength = 8;
        return strlen($password) >= $minLength;
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
