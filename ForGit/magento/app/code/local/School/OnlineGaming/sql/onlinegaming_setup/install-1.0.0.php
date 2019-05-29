<?php
$installer = $this;
$installer->startSetup();
/**
$installer->addEntityType('onlinegaming_eavgames',Array(
    'entity_model'          =>'onlinegaming/eavgames',
    'table'                 =>'onlinegaming/eavgames',
));

$installer->createEntityTables(
    $this->getTable('onlinegaming/eavgames')
);

$this->addAttribute('onlinegaming_eavgames', 'title', array(
    //the EAV attribute type, NOT a MySQL varchar
    'type'              => 'varchar',
    'label'             => 'Title',
    'input'             => 'text',
    'class'             => '',
    'backend'           => '',
    'frontend'          => '',
    'source'            => '',
    'required'          => true,
    'user_defined'      => true,
    'default'           => '',
    'unique'            => false,
));
$this->addAttribute('onlinegaming_eavgames', 'description', array(
    'type'              => 'text',
    'label'             => 'Description',
    'input'             => 'textarea',
));
$this->addAttribute('onlinegaming_eavgames', 'creator', array(
    'type'              => 'text',
    'label'             => 'Creator',
    'input'             => 'textarea',
));
$this->addAttribute('onlinegaming_eavgames', 'picture', array(
    'type'              => 'text',
    'label'             => 'Picture',
    'input'             => 'textarea',
));
**/
$installer->endSetup();
