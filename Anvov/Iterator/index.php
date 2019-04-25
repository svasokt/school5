<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 4/13/19
 * Time: 16:48
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Iterator/Classes/RentalOffice.php";
require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Iterator/Classes/Car.php";

use Anvov\Iterator\Classes\Car;


$car = new Car('2.0', 'black', 2100);
$car1 = new Car('3.0', 'black', 4444);
$car2 = new Car('4.0', 'black', 2500);

$carRental = new RentalOffice();
$carRental->addCar($car);
$carRental->addCar($car1);
$carRental->addCar($car2);

echo $carRental->count();
$carRental->removeCar($car1);
echo $carRental->count();
echo $carRental->key();
$carRental->next();
echo $carRental->key();
