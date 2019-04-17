<?php

namespace school5\kohutDM\KohutDMPatternsVol2\Composite;

define('ROOT',dirname(__FILE__));

require (ROOT . '/GetRandMana.php');
require (ROOT . '/JuniorMage.php');
require (ROOT . '/SeniorMage.php');

$firstJuniorMage = new JuniorMage();
$secondJuniorMage = new JuniorMage();
$thirdJuniorMage = new JuniorMage();
$firstSeniorMage = new SeniorMage();
$secondSeniorMage = new SeniorMage();
$firstSeniorMage->addMage($firstJuniorMage)
                ->addMage($secondJuniorMage);
$secondSeniorMage->addMage($firstSeniorMage)
                ->addMage($thirdJuniorMage);

echo "Our power is " . $secondSeniorMage->getRandMana() . "!";

