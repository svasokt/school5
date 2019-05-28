<?php
die('debug');
$cars = [
    [   'title' => 'ford',
        'content' => 'ford is a car',
        'color' => 'blue',
    ],
    [   'title' => 'vw',
        'content' => 'vw is a car',
        'color' => 'white',
    ],
    [   'title' => 'fiat',
        'content' => 'fiat is a car',
        'color' => 'red'
    ],

];
foreach ($cars as $car) {
    Mage::getModel('world/block')
        ->setData($car)
        ->save();
}
