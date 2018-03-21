<?php

namespace nestorbs;

class TransactionRepository
{
    private $transactions;
    private $calendar;

    public function __construct($calendar)
    {
        $this->calendar = $calendar;
    }

    public function addDeposit($amount)
    {
        $this->transactions[] = new Transaction(
            $this->calendar->todayAsString(),
            $amount
        );
    }

    public function addWithdrawal($amount)
    {
        $this->transactions[] = new Transaction(
            $this->calendar->todayAsString(),
            -$amount
        );
    }

    public function allTransactions()
    {
        return $this->transactions;
    }
}
