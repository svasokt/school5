<?php
//Singleton призначений для створення лише одного об'єкта класу , використовується у випадках коли є загроза
//кількох об'єктів , найчастіше використовуєтується для підключення до бази даних
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Singleton/Categories.php";
require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Singleton/Singletone.php";

$categories = new Categories();
$second = new Categories();
$third = new Categories();
var_dump($third->getAllCategories())
?>