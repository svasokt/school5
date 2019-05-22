<?php

$installer = $this;
$installer->startSetup();
$installer->createEntityTables(
    $this->getTable('complexworld/eavblogpost')
);
$installer->addEntityType('complexworld_eavblogpost', array(
    //entity_model це URI, яке передається у виклик Mage::getModel()
    'entity_model'  => 'complexworld/eavblogpost',

    //таблиця відноситься до URI ресурсу complexworld/eavblogpost
    //...eavblog_posts
    'table'      => 'complexworld/eavblogpost',
));

$installer->endSetup();
