<?php

namespace school5\kohutDM\KohutDMPatternsVol3\EAV;

define('ROOT',dirname(__FILE__));

require (ROOT . '/Entity.php');
require (ROOT . '/Attribute.php');
require (ROOT . '/Value.php');
require (ROOT . '/ConnectionDb.php');
require (ROOT . '/EntityFactory.php');

$connectionDb = new ConnectionDB();
$db = $connectionDb->getDbConnection();

$magicAttribute = new Attribute('magic', $db);
$fireValue = new Value($magicAttribute, 'fire');

$sizeAttribute = new Attribute('size', $db);
$largeValue = new Value($sizeAttribute, 'large');

$values = array($fireValue, $largeValue);

$entityFactory = new EntityFactory($db);

$swordEntity = $entityFactory->create('sword', $values, $db);
echo $swordEntity->getName() . " : " . $swordEntity->getValuesNames();