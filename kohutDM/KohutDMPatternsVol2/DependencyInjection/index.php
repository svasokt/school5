<?php

namespace school5\kohutDM\KohutDMPatternsVol2\DependencyInjection;

define('ROOT',dirname(__FILE__));

require (ROOT . '/DependencyClass.php');
require (ROOT . '/FirstDependency.php');
require (ROOT . '/SecondDependency.php');


$firstDependency = new FirstDependency();
$secondDependency = new SecondDependency();
$dependencyClass = new DependencyClass($firstDependency);
$dependencyClass->setSecondDependency($secondDependency);

echo $dependencyClass->firstDependency->firstDependency() . "<br/>";
echo $dependencyClass->secondDependency->secondDependency();
