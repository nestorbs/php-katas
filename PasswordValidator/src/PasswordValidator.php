<?php

namespace nestorbs;

class PasswordValidator
{
    public function password($password)
    {
        if (strlen($password) < 8) {
            return false;
        }
        return true;
    }
}
