<?php

require_once "BankAccount.php";
require_once "SavingsAccount.php";

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Лабораторна робота №5</title>
</head>
<body>

<h1>Банківські рахунки</h1>

<h2>Звичайний рахунок</h2>

<?php

try {

    $account = new BankAccount(1000, "USD");

    echo "Початковий баланс: "
        . $account->getBalance()
        . " "
        . $account->getCurrency()
        . "<br>";

    $account->deposit(500);

    echo "Після поповнення: "
        . $account->getBalance()
        . " "
        . $account->getCurrency()
        . "<br>";

    $account->withdraw(300);

    echo "Після зняття: "
        . $account->getBalance()
        . " "
        . $account->getCurrency()
        . "<br>";

} catch (Exception $e) {

    echo "Помилка: "
        . $e->getMessage()
        . "<br>";
}

?>

<h2>Накопичувальний рахунок</h2>

<?php

try {

    $savingsAccount =
        new SavingsAccount(2000, "EUR");

    echo "Початковий баланс: "
        . $savingsAccount->getBalance()
        . " "
        . $savingsAccount->getCurrency()
        . "<br>";

    $savingsAccount->applyInterest();

    echo "Після нарахування відсотків: "
        . $savingsAccount->getBalance()
        . " "
        . $savingsAccount->getCurrency()
        . "<br>";

} catch (Exception $e) {

    echo "Помилка: "
        . $e->getMessage()
        . "<br>";
}

?>

<h2>Перевірка винятку</h2>

<?php

try {

    $testAccount =
        new BankAccount(500, "USD");

    $testAccount->withdraw(1000);

} catch (Exception $e) {

    echo "Помилка: "
        . $e->getMessage();

}

?>

</body>
</html>
