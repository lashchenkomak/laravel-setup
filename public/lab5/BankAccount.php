<?php

require_once "AccountInterface.php";

class BankAccount implements AccountInterface
{
    const MIN_BALANCE = 0;

    protected $balance;
    protected $currency;

    public function __construct($balance, $currency)
    {
        if ($balance < self::MIN_BALANCE) {
            throw new Exception("Початковий баланс не може бути від'ємним");
        }

        $this->balance = $balance;
        $this->currency = $currency;
    }

    public function deposit($amount)
    {
        if ($amount < 0) {
            throw new Exception(
                "Сума поповнення не може бути від'ємною"
            );
        }

        $this->balance += $amount;
    }

    public function withdraw($amount)
    {
        if ($amount < 0) {
            throw new Exception(
                "Сума зняття не може бути від'ємною"
            );
        }

        if ($this->balance - $amount < self::MIN_BALANCE) {
            throw new Exception("Недостатньо коштів");
        }

        $this->balance -= $amount;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function getCurrency()
    {
        return $this->currency;
    }
}

?>
