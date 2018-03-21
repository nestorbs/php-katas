<?php

namespace nestorbs\Tests;

use PHPUnit\Framework\TestCase;
use nestorbs\Account;
use nestorbs\Transaction;

class AccountTest extends TestCase
{
    private $transactionsRepository;
    private $statementPrinter;
    private $account;
    private $date;

    protected function setUp()
    {
        $this->transactionsRepository = $this->prophesize('nestorbs\TransactionRepository');
        $this->statementPrinter = $this->prophesize('nestorbs\StatementPrinter');
        $this->account = new Account(
            $this->transactionsRepository->reveal(),
            $this->statementPrinter->reveal()
        );
        $this->date = new \DateTime('2018-03-17');
    }

    /** @test */
    public function should_store_deposite_transaction()
    {
        $this->account->deposit(1000);

        $this->transactionsRepository->addDeposit(1000)->shouldBeCalled();
    }

    /** @test */
    public function should_store_withdrawl_transaction()
    {
        $this->account->withdraw(500);

        $this->transactionsRepository->addWithdrawal(500)->shouldBeCalled();
    }

    /** @test */
    public function should_print_a_statement()
    {
        $transactions = [];
        $transactions[] = new Transaction($this->date, 1000);
        $this->transactionsRepository->allTransactions()->willReturn($transactions);

        $this->account->printStatement();

        $this->statementPrinter->print($transactions)->shouldBeCalled();
    }
}
