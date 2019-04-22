<?php

require_once 'DescriptionRoom.php';
require_once 'Room.php';

$room = new Room('tv', 'phone', 'sofa', 'table');

$descriptionRoom = new DescriptionRoom($room);

echo $descriptionRoom->getDescriptionRoom();

