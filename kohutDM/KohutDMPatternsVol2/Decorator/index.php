<?php

namespace school5\kohutDM\KohutDMPatternsVol2\Decorator;

define('ROOT',dirname(__FILE__));

require (ROOT . '/WeaponInterface.php');
require (ROOT . '/Sword.php');
require (ROOT . '/AbstractDecorator.php');
require (ROOT . '/PoisonDamage.php');
require (ROOT . '/FireDamage.php');

$magicSword = new FireDamage(new PoisonDamage(new Sword()));
echo "Attack power is " . $magicSword->attack() . "<br/>";
echo "This is " . $magicSword->description();