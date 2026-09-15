<?php

if (
    isset($_POST["name"]) &&
    isset($_POST["surname"]) &&
    !empty($_POST["name"]) &&
    !empty($_POST["surname"]) &&
    is_string($_POST["name"]) &&
    is_string($_POST["surname"])
) {
    $name = $_POST["name"];
    $surname = $_POST["surname"];

    echo "Привіт, " . $name . " " . $surname . "!";
} else {
    echo "Помилка: введіть ім'я та прізвище.";
}

?>
