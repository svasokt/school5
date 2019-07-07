<?php
$installer = new Mage_Customer_Model_Entity_Setup('core_setup');
$installer->startSetup();

$vCustomerEntityType = $installer->getEntityTypeId('customer');
$vCustAttributeSetId = $installer->getDefaultAttributeSetId($vCustomerEntityType);
$vCustAttributeGroupId = $installer->getDefaultAttributeGroupId($vCustomerEntityType, $vCustAttributeSetId);

$installer->addAttribute('customer', 'skills', array(
    'group'             => 'Skills',
    'backend'           => 'eav/entity_attribute_backend_array',
    'frontend'          => '',
    'class'             => '',
    'default'           => '',
    'label'             => 'Skills',
    'input'             => 'multiselect',
    'type'              => 'varchar',
    'forms'             => array('customer_account_edit','adminhtml_customer'),
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
$installer->addAttributeToGroup($vCustomerEntityType, $vCustAttributeSetId, $vCustAttributeGroupId, 'skills', 62);

$oAttribute = Mage::getSingleton('eav/config')->getAttribute('customer', 'skills');
$oAttribute->setData('used_in_forms', array('customer_account_edit','adminhtml_customer'));
$oAttribute->save();

$installer->addAttribute('customer', 'education', array(
    'type'              => 'text',
    'label'             => 'Education',
    'input'             => 'textarea',
    'forms'             => array('customer_account_edit','adminhtml_customer'),
));

$installer->addAttributeToGroup($vCustomerEntityType, $vCustAttributeSetId, $vCustAttributeGroupId, 'education', 63);

$oAttribute = Mage::getSingleton('eav/config')->getAttribute('customer', 'education');
$oAttribute->setData('used_in_forms', array('customer_account_edit','adminhtml_customer'));
$oAttribute->save();

$installer->addAttribute('customer', 'additional', array(
    'type'              => 'text',
    'label'             => 'Additional',
    'input'             => 'textarea',
    'forms'             => array('customer_account_edit','adminhtml_customer'),
));

$installer->addAttributeToGroup($vCustomerEntityType, $vCustAttributeSetId, $vCustAttributeGroupId, 'additional', 64);

$oAttribute = Mage::getSingleton('eav/config')->getAttribute('customer', 'additional');
$oAttribute->setData('used_in_forms', array('customer_account_edit','adminhtml_customer'));
$oAttribute->save();

$installer->endSetup();
