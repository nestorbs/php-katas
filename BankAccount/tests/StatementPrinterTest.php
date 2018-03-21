<?php

namespace nestorbs\Test;

use PHPUnit\Framework\TestCase;
use nestorbs\StatementPrinter;
use nestorbs\Transaction;

class StatementPrinterTest extends TestCase
{
    private $console;
    private $transactions;

    public function setUp()
    {
        $this->console = $this->prophesize('nestorbs\Console');
        $this->transactions = [];
    }

    /** @test */
    public function should_print_header()
    {
        $statementePrinter = new StatementPrinter($this->console->reveal());

        $statementePrinter->print($this->transactions);

        $this->console->printLine('date || credit || debit || balance')->shouldBeCalled();
    }

    /** @test */
    public function should_print_deposit_statement()
    {
        $this->transactions[] = new Transaction('10/01/2018', 1000);
        $statementePrinter = new StatementPrinter($this->console->reveal());

        $statementePrinter->print($this->transactions);

        $this->console->printLine('date || credit || debit || balance')->shouldBeCalled();
        $this->console->printLine('10/01/2018 || 1000.00 || || 1000.00')->shouldBeCalled();
    }

    /** @test */
    public function should_print_withdrawal_statement()
    {
        $this->transactions[] = new Transaction('14/01/2018', -500);
        $statementePrinter = new StatementPrinter($this->console->reveal());

        $statementePrinter->print($this->transactions);

        $this->console->printLine('date || credit || debit || balance')->shouldBeCalled();
        $this->console->printLine('14/01/2018 || || 500.00 || -500.00')->shouldBeCalled();
    }

    /** @test */
    public function should_print_all_statements()
    {
        $this->transactions[] = new Transaction('10/01/2018', 1000);
        $this->transactions[] = new Transaction('13/01/2018', 400);
        $this->transactions[] = new Transaction('14/01/2018', -500);
        $statementePrinter = new StatementPrinter($this->console->reveal());

        $statementePrinter->print($this->transactions);

        $this->console->printLine('date || credit || debit || balance')->shouldBeCalled();
        $this->console->printLine('14/01/2018 || || 500.00 || 900.00')->shouldBeCalled();
        $this->console->printLine('13/01/2018 || 400.00 || || 1400.00')->shouldBeCalled();
        $this->console->printLine('10/01/2018 || 1000.00 || || 1000.00')->shouldBeCalled();
    }
}
