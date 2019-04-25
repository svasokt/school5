<?php

require_once 'TransportInterface.php';
require_once 'Fly.php';
require_once 'FlyAdapter.php';
require_once 'TravelFromUkraineToUSA.php';
require_once 'Bus.php';

$fly = new Fly();
$bus = new Bus();
$flyAdapter = new FlyAdapter($fly);

$travelFromUkraineToUSA = new TravelFromUkraineToUSA();
echo $travelFromUkraineToUSA->travel($flyAdapter) ;

echo '<br>';

$travelFromUkraineToUSA = new TravelFromUkraineToUSA();
echo $travelFromUkraineToUSA->travel($bus) ;