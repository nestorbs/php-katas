<?php

namespace nestorbs;

class StatementPrinter
{
    const HEADER = 'date || credit || debit || balance';
    private $console;

    public function __construct($console)
    {
        $this->console = $console;
    }

    public function print($transactions)
    {
        $this->console->printLine($this::HEADER);
        $this->printStatements($transactions);
    }

    public function printStatements($transactions)
    {
        for ($i = count($transactions) - 1; $i >= 0; $i--) {
            $balance = $this->obtainBalance($transactions, $i);
            if ($transactions[$i]->amount() > 0) {
                $this->printDeposit($transactions[$i], $balance);
            } else {
                $this->printWithdrawal($transactions[$i], $balance);
            }
        }
    }

    private function printDeposit($transaction, $balance)
    {
        $this->console->printLine(
            $transaction->date() .
            ' || ' .
            number_format($transaction->amount(), 2, '.', '') .
            ' || || ' .
            number_format($balance, 2, '.', '')
        );
    }

    private function printWithdrawal($transaction, $balance)
    {
        $debit = -$transaction->amount();
        $this->console->printLine(
            $transaction->date() .
            ' || || ' .
            number_format($debit, 2, '.', '') .
            ' || ' .
            number_format($balance, 2, '.', '')
        );
    }

    private function obtainBalance($transactions, $i)
    {
        $balance = 0;
        for ($j = 0; $j <= $i ; $j++) {
            $balance = $balance + $transactions[$j]->amount();
        }
        return $balance;
    }
}
