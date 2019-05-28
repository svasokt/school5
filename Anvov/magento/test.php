<?php
include "app/Mage.php";
Mage::app();


$customerHelper = Mage::helper('customer/address');
var_dump(get_class($customerHelper));