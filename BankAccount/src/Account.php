<?php

namespace nestorbs;

class Account
{
    private $transactionsRepository;
    private $statementPrinter;

    public function __construct(
        TransactionRepository $transactionsRepository,
        StatementPrinter $statementPrinter
    ) {
        $this->transactionsRepository = $transactionsRepository;
        $this->statementPrinter = $statementPrinter;
    }

    public function deposit($amount)
    {
        $this->transactionsRepository->addDeposit($amount);
    }

    public function withdraw($amount)
    {
        $this->transactionsRepository->addWithdrawal($amount);
    }

    public function printStatement()
    {
        $this->statementPrinter->print($this->transactionsRepository->allTransactions());
    }
}
