<?php

require_once 'Prod.php';
require_once 'Observer.php';
require_once 'Observable.php';

$petro = new Observer('petro');
$ivan = new Observer('ivan');

// Создаем публикацию и добавляем подписчика
$car = new Observable();
$car->addSubscribe($petro);
$car->addSubscribe($ivan);

// Добавляем новую работу и смотрим получит ли соискатель уведомление
$car->AddProduct(new Prod('ford connect'));
