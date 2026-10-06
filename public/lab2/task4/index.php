<?php

session_start();

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["add_product"])) {

        $product = $_POST["product"];

        $_SESSION["cart"][] = $product;
    }

    if (isset($_POST["finish_session"])) {

        $currentPurchases = implode("|", $_SESSION["cart"]);

        if ($currentPurchases != "") {

            if (
                isset($_COOKIE["previous_purchases"])
                && $_COOKIE["previous_purchases"] != ""
            ) {
                $allPurchases =
                    $_COOKIE["previous_purchases"]
                    . "|"
                    . $currentPurchases;
            } else {
                $allPurchases = $currentPurchases;
            }

            setcookie(
                "previous_purchases",
                $allPurchases,
                time() + 30 * 24 * 60 * 60
            );
        }

        session_unset();
        session_destroy();

        header("Location: index.php");

        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Корзина</title>
</head>
<body>

<h2>Корзина покупок</h2>

<form method="post">

    <select name="product">

        <option value="Ноутбук">
            Ноутбук
        </option>

        <option value="Мишка">
            Мишка
        </option>

        <option value="Клавіатура">
            Клавіатура
        </option>

    </select>

    <button type="submit" name="add_product">
        Додати
    </button>

</form>

<h3>Поточна корзина:</h3>

<?php

if (count($_SESSION["cart"]) == 0) {

    echo "Корзина порожня.";

} else {

    foreach ($_SESSION["cart"] as $product) {
        echo $product . "<br>";
    }

}

?>

<h3>Попередні покупки:</h3>

<?php

if (
    isset($_COOKIE["previous_purchases"])
    && $_COOKIE["previous_purchases"] != ""
) {

    $previousPurchases =
        explode("|", $_COOKIE["previous_purchases"]);

    foreach ($previousPurchases as $product) {
        echo $product . "<br>";
    }

} else {

    echo "Попередніх покупок немає.";

}

?>

<br><br>

<form method="post">

    <button type="submit" name="finish_session">
        Завершити сеанс
    </button>

</form>

</body>
</html>
