<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "users_db";

$conn = new mysqli(
    $host,
    $username,
    $password,
    $database
);

if ($conn->connect_error) {
    die(
        "Помилка підключення до бази даних: "
        . $conn->connect_error
    );
}

?>
