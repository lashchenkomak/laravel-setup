<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["save_name"]) && !empty($_POST["name"])) {
        $name = $_POST["name"];

        setcookie("username", $name, time() + 7 * 24 * 60 * 60);

        $_COOKIE["username"] = $name;
    }

    if (isset($_POST["delete_cookie"])) {
        setcookie("username", "", time() - 3600);

        unset($_COOKIE["username"]);
    }
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>COOKIE</title>
</head>
<body>

<h2>Робота з COOKIE</h2>

<?php

if (isset($_COOKIE["username"])) {
    echo "<p>Привіт, " . $_COOKIE["username"] . "!</p>";
}

?>

<form method="post">
    <label>Ім'я:</label>
    <input type="text" name="name">

    <button type="submit" name="save_name">
        Зберегти ім'я
    </button>
</form>

<br>

<form method="post">
    <button type="submit" name="delete_cookie">
        Видалити cookie
    </button>
</form>

</body>
</html>
