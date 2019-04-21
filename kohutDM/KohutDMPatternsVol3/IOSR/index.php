<?php

namespace school5\kohutDM\KohutDMPatternsVol3\IOSR;

define('ROOT',dirname(__FILE__));

require (ROOT . '/Soldier.php');
require (ROOT . '/Squad.php');
require (ROOT . '/ConnectionDB.php');
require (ROOT . '/HeroStrategy.php');
require (ROOT . '/NameObserver.php');
require (ROOT . '/ResourceCRUD.php');
require (ROOT . '/SoldierFactory.php');
require (ROOT . '/SoldierRepository.php');


$connectionDb = new ConnectionDB();
$db = $connectionDb->getDbConnection();

$nameObserver = new NameObserver();
$soldierFactory = new SoldierFactory();
$resourceCRUD = new ResourceCRUD();
$heroStrategy = new HeroStrategy();
$soldierRepository = new SoldierRepository($db, $resourceCRUD, $soldierFactory);
$squad = new Squad($soldierRepository, $heroStrategy);
$squad->attach($nameObserver);

$squad->createSoldier()->createSoldier()->createSoldier();

foreach ($squad as $soldier){
    echo $soldier->getName() . ", ";
}