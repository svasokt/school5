<?php
$installer = new Mage_Customer_Model_Entity_Setup('core_setup');
$installer->startSetup();



$installer->updateAttribute('customer', 'education', 'sort_order', 99);
$installer->updateAttribute('customer', 'additional', 'sort_order', 100);
$installer->updateAttribute('customer', 'avatar', 'frontend_input', 'image');
$installer->updateAttribute('customer', 'skills', 'source_model', 'training_avatarcustomer/skillssource');

$installer->endSetup();
