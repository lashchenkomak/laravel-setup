<?php

session_start();

require_once "config.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if (
        empty($username)
        || empty($password)
    ) {

        $message = "Заповніть усі поля.";

    } else {

        $sql =
            "SELECT id, username, password
             FROM users
             WHERE username = ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "s",
            $username
        );

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 1) {

            $user = $result->fetch_assoc();

            if (
                md5($password)
                === $user["password"]
            ) {

                $_SESSION["user_id"] =
                    $user["id"];

                $_SESSION["username"] =
                    $user["username"];

                header(
                    "Location: welcome.php"
                );

                exit;

            } else {

                $message =
                    "Неправильний пароль.";
            }

        } else {

            $message =
                "Користувача не знайдено.";
        }

        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Авторизація</title>
</head>
<body>

<h1>Авторизація</h1>

<?php

if ($message != "") {
    echo "<p>" . $message . "</p>";
}

?>

<form method="post">

    <label>Ім'я користувача:</label>
    <input type="text" name="username">

    <br><br>

    <label>Пароль:</label>
    <input type="password" name="password">

    <br><br>

    <button type="submit">
        Увійти
    </button>

</form>

<br>

<a href="register.php">
    Реєстрація
</a>

</body>
</html>
