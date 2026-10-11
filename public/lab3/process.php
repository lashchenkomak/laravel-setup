<?php

if (!is_dir("uploads")) {
    mkdir("uploads");
}

if (isset($_FILES["user_file"])) {

    $file = $_FILES["user_file"];

    if (!is_uploaded_file($file["tmp_name"])) {
        die("Помилка завантаження файлу.");
    }

    $fileName = $file["name"];
    $fileSize = $file["size"];
    $fileType = $file["type"];

    $extension = strtolower(
        pathinfo($fileName, PATHINFO_EXTENSION)
    );

    $allowedExtensions = array(
        "png",
        "jpg",
        "jpeg"
    );

    if (!in_array($extension, $allowedExtensions)) {
        die("Дозволено завантажувати тільки PNG, JPG та JPEG.");
    }

    if ($fileSize > 2 * 1024 * 1024) {
        die("Розмір файлу не повинен перевищувати 2 МБ.");
    }

    $uploadPath = "uploads/" . $fileName;

    if (file_exists($uploadPath)) {

        $nameWithoutExtension =
            pathinfo($fileName, PATHINFO_FILENAME);

        $fileName =
            $nameWithoutExtension
            . "_"
            . time()
            . "."
            . $extension;

        $uploadPath = "uploads/" . $fileName;
    }

    if (
        move_uploaded_file(
            $file["tmp_name"],
            $uploadPath
        )
    ) {

        echo "<h2>Файл успішно завантажено</h2>";

        echo "Ім'я файлу: "
            . $fileName
            . "<br>";

        echo "Тип файлу: "
            . $fileType
            . "<br>";

        echo "Розмір файлу: "
            . round($fileSize / 1024, 2)
            . " КБ<br><br>";

        echo '<a href="'
            . $uploadPath
            . '">Завантажити файл</a>';

        echo "<br><br>";

        echo '<a href="index.html">Назад</a>';

    } else {

        echo "Не вдалося зберегти файл.";

    }

} else {

    echo "Файл не вибрано.";

}

?>
