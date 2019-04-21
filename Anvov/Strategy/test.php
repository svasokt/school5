<?php
/**
 * Strategy
 *
 * @category school5
 * @package Strategy
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Iterator/Classes/Car.php";
require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Strategy/Classes/Engine.php";
require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Strategy/Classes/CarPrice.php";
require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Strategy/Classes/RentOffice.php";

use Anvov\Iterator\Classes\Car;

$car1 = new Car('2.3', 'yelow', 2200);
$car2 = new Car('2.5', 'black', 25000);
$car3 = new Car('1.9', 'black', 21000);
$car4 = new Car('2.7', 'black', 19000);
$carPool = [$car1, $car2, $car3, $car4];

$priceStrategy = new CarPrice;
$engineStrategy = new Engine();


$carSeller = new RentOffice($priceStrategy);
$carSeller->chooseCar($carPool);

$carSeller = new RentOffice($engineStrategy);
$carSeller->chooseCar($carPool)




?>