# Bank account kata

Manage the transactions of a bank account.

## Requirements

- Deposit and Withdrawal
- Transfer
- Account statement (date, amount, balance)
- Statement printing
- Statement filters (just deposits, withdrawal, date)

## Rules

1. One level of indentation per method.
2. Don’t use the ELSE keyword.
3. Wrap all primitives and Strings.
4. First class collections.
5. One dot per line.
6. Don’t abbreviate.
7. Keep all entities small (50 lines).
8. No classes with more than two instance variables.
9. No getters/setters/properties.

## Info

[Object Calisthenics](http://www.cs.helsinki.fi/u/luontola/tdd-2009/ext/ObjectCalisthenics.pdf)

## Acceptance test

```Gherkin
Given a client makes a deposit of 1000 on 10-01-2018
And a deposit of 400 on 13-01-2018
And a withdrawal of 500 on 14-01-2018
When she prints her bank statement
Then she would see
date || credit || debit || balance
14/01/2018 || || 500.00 || 900.00
13/01/2018 || 400.00 || || 1400.00
10/01/2018 || 1000.00 || || 1000.00
```