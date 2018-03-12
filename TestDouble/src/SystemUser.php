<?php

namespace nestorbs;

class SystemUser
{
    protected $sender;

    public function __construct(Sender $sender)
    {
        $this->sender = $sender;
    }

    public function getUser()
    {
        $this->sender->sendMail();
    }
}
