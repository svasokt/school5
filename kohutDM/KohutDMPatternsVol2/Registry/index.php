<?php

namespace school5\kohutDM\KohutDMPatternsVol2\Registry;

define('ROOT',dirname(__FILE__));

require(ROOT . '/Registry.php');

Registry::setHeroes('Thor', 'I have a mighty HAMMER!');
Registry::setHeroes('Thor', 'Have I a mighty HAMMER?');
echo "<br/>";
$hero = Registry::getHeroes('Batman');
echo $hero;
echo "<br/>";
Registry::setHeroes('Batman', 'I`m Batman');
$hero = Registry::getHeroes('Batman');
echo $hero;
echo "<br/>";
$hero = Registry::getHeroes('Thor');
echo $hero;