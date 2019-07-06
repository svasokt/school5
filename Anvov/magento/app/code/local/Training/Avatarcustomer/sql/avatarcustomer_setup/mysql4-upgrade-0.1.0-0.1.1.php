<?php
$installer = new Mage_Customer_Model_Entity_Setup('core_setup');
$installer->startSetup();

$installer->addAttribute('customer', 'skills', array(
    'group'             => 'Skills',
    'backend'           => 'eav/entity_attribute_backend_array',
    'frontend'          => '',
    'class'             => '',
    'default'           => '',
    'label'             => 'Skills',
    'input'             => 'multiselect',
    'type'              => 'varchar',
    'source'            => 'training_avatarcustomer/skills',
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'is_visible'        => 1,
    'required'          => 0,
    'searchable'        => 0,
    'filterable'        => 0,
    'unique'            => 0,
    'comparable'        => 0,
    'visible_on_front'  => 1,
    'user_defined'      => 1,
));
$installer->addAttribute('customer', 'education', array(
    'type'              => 'text',
    'label'             => 'Education',
    'input'             => 'textarea',
));
$installer->addAttribute('customer', 'additional', array(
    'type'              => 'text',
    'label'             => 'Additional',
    'input'             => 'textarea',
));

$installer->endSetup();
