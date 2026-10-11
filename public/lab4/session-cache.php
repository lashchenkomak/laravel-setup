<?php

session_start();

$cacheTime = 600;

if (isset($_GET["clear"])) {

    unset($_SESSION["cached_data"]);
    unset($_SESSION["cached_time"]);

    header("Location: session-cache.php");
    exit;
}

if (
    isset($_SESSION["cached_data"])
    && isset($_SESSION["cached_time"])
    && (time() - $_SESSION["cached_time"]) < $cacheTime
) {

    $data = $_SESSION["cached_data"];

    $source = "Дані отримано з кешу SESSION";

} else {

    sleep(2);

    $data = array(
        "USD" => rand(35, 40),
        "EUR" => rand(38, 43),
        "generated_at" => date("H:i:s")
    );

    $_SESSION["cached_data"] = $data;
    $_SESSION["cached_time"] = time();

    $source = "Створено новий кеш";
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>SESSION кеш</title>
</head>
<body>

<h1>Кешування через SESSION</h1>

<p>
    <?php echo $source; ?>
</p>

<p>
    USD:
    <?php echo $data["USD"]; ?>
</p>

<p>
    EUR:
    <?php echo $data["EUR"]; ?>
</p>

<p>
    Час генерації:
    <?php echo $data["generated_at"]; ?>
</p>

<a href="session-cache.php">
    Оновити сторінку
</a>

<br><br>

<a href="session-cache.php?clear=1">
    Очистити кеш
</a>

<br><br>

<a href="index.html">
    Назад
</a>

</body>
</html>
