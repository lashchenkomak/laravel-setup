<?php

if (
    isset($_POST["text"])
    && !empty($_POST["text"])
) {

    $text = $_POST["text"];

    file_put_contents(
        "log.txt",
        $text . PHP_EOL,
        FILE_APPEND
    );

}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Робота з текстовим файлом</title>
</head>
<body>

<h2>Вміст файлу log.txt</h2>

<?php

if (file_exists("log.txt")) {

    $content = file_get_contents("log.txt");

    echo nl2br($content);

} else {

    echo "Файл log.txt ще не створено.";

}

?>

<br><br>

<a href="index.html">Назад</a>

</body>
</html>
