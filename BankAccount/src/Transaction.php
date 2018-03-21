<?php

namespace nestorbs;

class Transaction
{
    private $date;
    private $amount;

    public function __construct($date, $amount)
    {
        $this->date = $date;
        $this->amount = $amount;
    }

    public function date()
    {
        return $this->date;
    }

    public function amount()
    {
        return $this->amount;
    }
}
