<?php

namespace school5\kohutDM\KohutDMPatternsVol2\Adapter;

define('ROOT',dirname(__FILE__));

require (ROOT . '/EnglishCommandsInterface.php');
require (ROOT . '/FrenchCommandsInterface.php');
require (ROOT . '/FrenchSoldier.php');
require (ROOT . '/FrenchSoldierAdapter.php');

$french = new FrenchSoldier();
$soldier = new FrenchSoldierAdapter($french);
echo "Attack my French brothers! - " . $soldier->attack() . "<br/>";
echo "Defence your king! - " . $soldier->defence() . "<br/>";