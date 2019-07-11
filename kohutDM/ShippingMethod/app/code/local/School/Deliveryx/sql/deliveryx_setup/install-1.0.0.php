<?php
$installer = $this;
$installer->startSetup();

$installer->addEntityType('deliveryx_offices',Array(
    'entity_model'          =>'deliveryx/offices',
    'table'                 =>'deliveryx/offices',
));

//$installer->createEntityTables(
//    $this->getTable('deliveryx/offices')
//);

$this->addAttribute('deliveryx_offices', 'number', array(
    //the EAV attribute type, NOT a MySQL varchar
    'type'              => 'int',
    'label'             => 'Number',
    'input'             => 'text',
));
$this->addAttribute('deliveryx_offices', 'short_address', array(
    'type'              => 'text',
    'label'             => 'Short Address',
    'input'             => 'text',
));
$this->addAttribute('deliveryx_offices', 'max_weight', array(
    'type'              => 'decimal',
    'label'             => 'Max Weight',
    'input'             => 'text',
));
$this->addAttribute('deliveryx_offices', 'work_status', array(
    'type'              => 'int',
    'label'             => 'Work Status',
    'input'             => 'select',
    'source'            => 'eav/entity_attribute_source_boolean',
));
$this->addAttribute('deliveryx_offices', 'opening', array(
    'type'              => 'int',
    'label'             => 'Opening Time',
    'input'             => 'select',
));
$this->addAttribute('deliveryx_offices', 'closing', array(
    'type'              => 'int',
    'label'             => 'Closing Time',
    'input'             => 'select',
));

$this->addAttribute('deliveryx_offices', 'min_weight', array(
    'type'              => 'decimal',
    'label'             => 'Max Weight',
    'input'             => 'text',
));
$this->addAttribute('deliveryx_offices', 'contact_email', array(
    'type'              => 'text',
    'label'             => 'Contact Email',
    'input'             => 'text',
));
$this->addAttribute('deliveryx_offices', 'phone_number', array(
    'type'              => 'text',
    'label'             => 'Phone Number',
    'input'             => 'text',
));
$this->addAttribute('deliveryx_offices', 'street', array(
    'type'              => 'text',
    'label'             => 'Street',
    'input'             => 'text',
));
$this->addAttribute('deliveryx_offices', 'postcode', array(
    'type'              => 'text',
    'label'             => 'Postcode',
    'input'             => 'text',
));
$this->addAttribute('deliveryx_offices', 'country_id', array(
    'type'              => 'varchar',
    'label'             => 'Country',
    'class'             => 'countries',
    'input'             => 'select',
    'source'            => 'adminhtml/system_config_source_country',
));
$this->addAttribute('deliveryx_offices', 'city', array(
    'type'              => 'text',
    'label'             => 'City',
    'input'             => 'text',
));

$installer->endSetup();
