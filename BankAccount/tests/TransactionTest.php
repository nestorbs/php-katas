<?php

namespace nestorbs\Test;

use PHPUnit\Framework\TestCase;
use nestorbs\Transaction;

class TransactionTest extends TestCase
{
    /** @test */
    public function should_store_amount_and_date()
    {
        $date = new \DateTime('2018-03-17');

        $transaction = new Transaction($date, 1000);

        $this->assertEquals($date, $transaction->date());
        $this->assertEquals(1000, $transaction->amount());
    }
}
