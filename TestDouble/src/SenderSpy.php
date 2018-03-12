<?php

namespace nestorbs;

class SenderSpy implements Sender
{
    protected $sent = false;

    public function sendMail()
    {
        $this->sent = true;
    }

    public function mailSent()
    {
        return $this->sent;
    }
}
