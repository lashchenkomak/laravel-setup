<?php

session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];

    if ($login == "admin" && $password == "1234") {
        $_SESSION["username"] = $login;
    } else {
        $error = "Неправильний логін або пароль.";
    }
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>SESSION</title>
</head>
<body>

<h2>Робота з SESSION</h2>

<?php if (isset($_SESSION["username"])): ?>

    <p>
        Привіт, <?php echo $_SESSION["username"]; ?>!
    </p>

    <a href="logout.php">Вихід</a>

<?php else: ?>

    <?php

    if ($error != "") {
        echo "<p>" . $error . "</p>";
    }

    ?>

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
