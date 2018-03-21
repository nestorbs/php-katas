<?php

namespace nestorbs\Tests;

use PHPUnit\Framework\TestCase;
use nestorbs\Account;
use nestorbs\TransactionRepository;
use nestorbs\StatementPrinter;

class PrintStatementsFeatureTest extends TestCase
{
    private $transactionsRepository;
    private $statementPrinter;
    private $account;
    private $console;
    private $calendar;

    protected function setUp()
    {
        $this->calendar = $this->prophesize('nestorbs\Calendar');
        $this->console = $this->prophesize('nestorbs\Console');
        $this->transactionsRepository = new TransactionRepository($this->calendar->reveal());
        $this->statementPrinter = new StatementPrinter($this->console->reveal());
        $this->account = new Account(
            $this->transactionsRepository,
            $this->statementPrinter
        );
    }

    /** @test */
    public function should_print_bank_statement()
    {
        $this->calendar->todayAsString()->willReturn(
            '10/01/2018',
            '13/01/2018',
            '14/01/2018'
        );
        $this->account->deposit(1000);
        $this->account->deposit(400);
        $this->account->withdraw(500);

        $this->account->printStatement();

        $this->console->printLine('date || credit || debit || balance')->shouldBeCalled();
        $this->console->printLine('14/01/2018 || || 500.00 || 900.00')->shouldBeCalled();
        $this->console->printLine('13/01/2018 || 400.00 || || 1400.00')->shouldBeCalled();
        $this->console->printLine('10/01/2018 || 1000.00 || || 1000.00')->shouldBeCalled();
    }
}
