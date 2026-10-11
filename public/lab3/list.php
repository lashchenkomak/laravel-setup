<?php

if (!is_dir("uploads")) {
    mkdir("uploads");
}

$files = scandir("uploads");

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Список файлів</title>
</head>
<body>

<h2>Список завантажених файлів</h2>

<?php

$filesFound = false;

foreach ($files as $file) {

    if ($file != "." && $file != "..") {

        $filesFound = true;

        echo '<a href="uploads/'
            . $file
            . '">'
            . $file
            . '</a>';

        echo "<br>";

    }

}

if (!$filesFound) {
    echo "Файлів немає.";
}

?>

<br><br>

<a href="index.html">Назад</a>

</body>
</html>
