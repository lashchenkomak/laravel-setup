<?php

require_once "config.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (
        empty($username)
        || empty($email)
        || empty($password)
    ) {

        $message = "Заповніть усі поля.";

    } else {

        $hashedPassword = md5($password);

        $sql =
            "INSERT INTO users (username, email, password)
             VALUES (?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "sss",
            $username,
            $email,
            $hashedPassword
        );

        if ($stmt->execute()) {

            $message =
                "Реєстрація успішна. Тепер можна увійти.";

        } else {

            $message =
                "Помилка реєстрації. Ім'я або email вже існує.";

        }

        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Реєстрація</title>
</head>
<body>

<h1>Реєстрація</h1>

<?php

if ($message != "") {
    echo "<p>" . $message . "</p>";
}

?>

<form method="post">

    <label>Ім'я користувача:</label>
    <input type="text" name="username">

    <br><br>

    <label>Email:</label>
    <input type="email" name="email">

    <br><br>

    <label>Пароль:</label>
    <input type="password" name="password">

    <br><br>

    <button type="submit">
        Зареєструватися
    </button>

</form>

<br>

<a href="login.php">
    Перейти до авторизації
</a>

</body>
</html>
