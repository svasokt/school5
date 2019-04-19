<?php

// Пул об'єктів створений для економії часу нв створення нових об'єктів , тому всі об'єкти створюються в один момент
// і вони витягуються з масиву об'єктів для використання


error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/PoolObjects/Car.php";
require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/PoolObjects/RentCarsOffice.php";

//Test 1 - with empty arrays;
$Office = new RentCarsOffice();
$Ford = $Office->getCar();
$Office->returnCar($Ford);

//$Mercides = $Office->getCar();

var_dump($Office->showFreeCars())

?>