<?php
// Патерн Композит створений для того щоб об'єднувати і укправляти групою класів які схожі між собою. Часто
// метод класу кореня використовує в собі такий же метод як метод об'єктів з похідних класівю

//створення структур в яких групи об'єктів можна використовувати так ніби це окремий об'єкт


error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Composite/Classes/CompositeUnit.php";
require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Composite/Api/Unit.php";
require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Composite/Classes/Archer.php";
require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Composite/Classes/Army.php";
require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Composite/Classes/Laser.php";



$mainArmy = new Army();
$mainArmy->AddUnit(new Archer());
$object1 = new Laser();
$mainArmy->AddUnit($object1);

$subArmy = new Army();
$subArmy->AddUnit(new Laser());
$subArmy->AddUnit(new Laser());
$subArmy->AddUnit(new Laser());

$mainArmy->AddArmy($subArmy);
var_dump($mainArmy->bombardStrenghth());


?>