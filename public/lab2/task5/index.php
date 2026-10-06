<?php

session_start();

$timeout = 300;

$message = "";

if (isset($_SESSION["last_activity"])) {

    if (
        time() - $_SESSION["last_activity"]
        > $timeout
    ) {

        session_unset();
        session_destroy();

        session_start();

        $message =
            "Сесію завершено через 5 хвилин неактивності.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $login = $_POST["login"];
    $password = $_POST["password"];

    if ($login == "admin" && $password == "1234") {

        $_SESSION["username"] = $login;

        $_SESSION["last_activity"] = time();

    } else {

        $message =
            "Неправильний логін або пароль.";
    }
}

if (isset($_SESSION["username"])) {

    $_SESSION["last_activity"] = time();

}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Час активності</title>
</head>
<body>

<h2>Контроль часу активності сесії</h2>

<?php

if ($message != "") {
    echo "<p>" . $message . "</p>";
}

?>

<?php if (isset($_SESSION["username"])): ?>

    <p>
        Привіт,
        <?php echo $_SESSION["username"]; ?>!
    </p>

    <p>
        Сесія завершиться автоматично
        після 5 хвилин неактивності.
    </p>

    <a href="logout.php">
        Вихід
    </a>

<?php else: ?>

    <form method="post">

        <label>Логін:</label>
        <input type="text" name="login">

        <br><br>

        <label>Пароль:</label>
        <input type="password" name="password">

        <br><br>

        <button type="submit">
            Увійти
        </button>

    </form>

<?php endif; ?>

</body>
</html>
