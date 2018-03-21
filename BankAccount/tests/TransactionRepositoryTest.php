<?php

namespace nestorbs\Test;

use PHPUnit\Framework\TestCase;
use nestorbs\TransactionRepository;
use nestorbs\Transaction;

class TransactionRepositoryTest extends TestCase
{
    private $calendar;
    private $transactionsRepository;

    public function setUp()
    {
        $this->calendar = $this->prophesize('\nestorbs\Calendar');
        $this->transactionsRepository = new TransactionRepository($this->calendar->reveal());
    }

    /** @test */
    public function should_create_and_store_a_deposit_transaction()
    {
        $this->calendar->todayAsString()->willReturn('10/01/2018');
        $this->transactionsRepository->addDeposit(1000);

        $transactions = $this->transactionsRepository->allTransactions();

        $this->assertEquals(1, count($transactions));
        $this->assertEquals($transactions[0], new Transaction('10/01/2018', 1000));
    }

    /** @test */
    public function should_create_and_store_a_withdrawl_transaction()
    {
        $this->calendar->todayAsString()->willReturn('14/01/2018');
        $this->transactionsRepository->addWithdrawal(500);

        $transactions = $this->transactionsRepository->allTransactions();

        $this->assertEquals(1, count($transactions));
        $this->assertEquals($transactions[0], new Transaction('14/01/2018', -500));
    }
}
