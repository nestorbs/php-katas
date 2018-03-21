<?php

namespace nestorbs;

require '../vendor/autoload.php';

$calendar = new Calendar();
$console = new Console();
$transactionRepository = new TransactionRepository($calendar);
$statementPrinter = new StatementPrinter($console);
$account = new Account($transactionRepository, $statementPrinter);

$account->deposit(2000);
$account->withdraw(700);
$account->deposit(300);

$account->printStatement();
