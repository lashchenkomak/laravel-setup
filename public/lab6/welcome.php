<?php

session_start();

if (!isset($_SESSION["username"])) {

    header("Location: login.php");

    exit;
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>
<body>

<h1>
    Вітаємо,
    <?php echo htmlspecialchars($_SESSION["username"]); ?>!
</h1>

<p>
    Ви успішно авторизувалися.
</p>

<a href="logout.php">
    Вийти
</a>

</body>
</html>
