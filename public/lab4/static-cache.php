<?php

class DataCache
{
    private static $data = null;

    public static function getData()
    {
        if (self::$data === null) {

            sleep(2);

            self::$data = array(
                "USD" => rand(35, 40),
                "EUR" => rand(38, 43),
                "generated_at" => date("H:i:s")
            );
        }

        return self::$data;
    }
}


$startFirst = microtime(true);

$firstData = DataCache::getData();

$firstTime =
    round(microtime(true) - $startFirst, 4);


$startSecond = microtime(true);

$secondData = DataCache::getData();

$secondTime =
    round(microtime(true) - $startSecond, 4);

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Static cache</title>
</head>
<body>

<h1>Кеш через статичну властивість класу</h1>

<h2>Перше звернення</h2>

<p>
    USD:
    <?php echo $firstData["USD"]; ?>
</p>

<p>
    EUR:
    <?php echo $firstData["EUR"]; ?>
</p>

<p>
    Час:
    <?php echo $firstTime; ?>
    секунд
</p>


<h2>Друге звернення</h2>

<p>
    USD:
    <?php echo $secondData["USD"]; ?>
</p>

<p>
    EUR:
    <?php echo $secondData["EUR"]; ?>
</p>

<p>
    Час:
    <?php echo $secondTime; ?>
    секунд
</p>

<br>

<a href="index.html">
    Назад
</a>

</body>
</html>
