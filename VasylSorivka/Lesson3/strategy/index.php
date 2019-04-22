<meta charset="utf-8"/>

<?php

require_once 'TripToKievInterface.php';
require_once 'TripByTrain.php';
require_once 'TripByCar.php';
require_once 'Trip.php';

$tripToKiev = new Trip(new TripByCar());
echo $tripToKiev->trip();

echo '<br>';

$tripToKiev = new Trip(new TripByTrain());
echo $tripToKiev->trip();


