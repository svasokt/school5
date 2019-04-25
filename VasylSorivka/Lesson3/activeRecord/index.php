<?php

require_once 'ActiveRecord.php';

$ar = new ActiveRecord();
$ar->setConfigDB('oss', 'root', '', 'test', 'test');

$fields = ['name'];
$value = ['vasya'];

$ar->insert($fields, $value);

$fields = array('id', 'name');
$result = $ar->select($fields);

while ($row = mysqli_fetch_array($result)) {
    echo " || " . $row['id'] . " => " . $row['name']   ;
}