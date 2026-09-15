<?php

// Завдання 1 Створення базового PHP-скрипта
echo "Hello, World!<br><br>";


// Завдання 2 Змінні та типи даних
$stringValue = "PHP";
$integerValue = 10;
$floatValue = 3.14;
$booleanValue = true;

echo "Рядок: " . $stringValue . "<br>";
echo "Ціле число: " . $integerValue . "<br>";
echo "Число з плаваючою комою: " . $floatValue . "<br>";
echo "Булеве значення: " . $booleanValue . "<br><br>";

var_dump($stringValue);
echo "<br>";
var_dump($integerValue);
echo "<br>";
var_dump($floatValue);
echo "<br>";
var_dump($booleanValue);
echo "<br><br>";


// Завдання 3 Конкатенація рядків
$firstString = "Hello";
$secondString = "World";

$resultString = $firstString . " " . $secondString;

echo $resultString . "<br><br>";


// Завдання 4 Умовні конструкції
$number = 7;

if ($number % 2 == 0) {
    echo "Число " . $number . " є парним.<br><br>";
} else {
    echo "Число " . $number . " є непарним.<br><br>";
}


// Завдання 5 Цикли
echo "Цикл for: ";

for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
}

echo "<br>";

echo "Цикл while: ";

$i = 10;

while ($i >= 1) {
    echo $i . " ";
    $i--;
}

echo "<br><br>";


// Завдання 6 Масивиgit status
$student = array(
    "name" => "Максим",
    "surname" => "Лащенко",
    "age" => 20,
    "speciality" => "Комп'ютерні науки"
);

echo "Ім'я: " . $student["name"] . "<br>";
echo "Прізвище: " . $student["surname"] . "<br>";
echo "Вік: " . $student["age"] . "<br>";
echo "Спеціальність: " . $student["speciality"] . "<br><br>";

$student["averageGrade"] = 4.5;

echo "Оновлений масив:<br>";
echo "<pre>";
print_r($student);
echo "</pre>";

?>
