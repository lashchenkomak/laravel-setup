<?php

$cacheDirectory = "cache";
$cacheFile = $cacheDirectory . "/report.html";

$cacheTime = 600;

if (!is_dir($cacheDirectory)) {
    mkdir($cacheDirectory);
}

$startTime = microtime(true);

if (
    file_exists($cacheFile)
    && (time() - filemtime($cacheFile)) < $cacheTime
) {

    $content = file_get_contents($cacheFile);

    $source = "Дані отримано з кешу";

} else {

    sleep(3);

    $names = array(
        "Іван",
        "Максим",
        "Олександр",
        "Анна",
        "Марія"
    );

    $content = "";

    $content .= "<h2>Великий HTML-звіт</h2>";

    $content .= "<p>Час генерації: "
        . date("H:i:s")
        . "</p>";

    $content .= "<table border='1'>";

    $content .= "
        <tr>
            <th>№</th>
            <th>Ім'я</th>
            <th>Сума</th>
            <th>Дата</th>
        </tr>
    ";

    for ($i = 1; $i <= 1000; $i++) {

        $name = $names[array_rand($names)];
        $amount = rand(100, 10000);
        $date = date("d.m.Y");

        $content .= "
            <tr>
                <td>$i</td>
                <td>$name</td>
                <td>$amount</td>
                <td>$date</td>
            </tr>
        ";
    }

    $content .= "</table>";

    file_put_contents(
        $cacheFile,
        $content
    );

    $source = "Створено новий кеш";
}

$executionTime =
    round(microtime(true) - $startTime, 4);

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Файлове кешування</title>
</head>
<body>

<h1>Файлове кешування</h1>

<p>
    <?php echo $source; ?>
</p>

<p>
    Час виконання:
    <?php echo $executionTime; ?>
    секунд
</p>

<?php echo $content; ?>

<br><br>

<a href="index.html">Назад</a>

</body>
</html>
