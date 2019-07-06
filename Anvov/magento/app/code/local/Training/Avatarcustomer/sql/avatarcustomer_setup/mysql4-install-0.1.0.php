<?php
$installer = new Mage_Customer_Model_Entity_Setup('core_setup');

$installer->startSetup();

$vCustomerEntityType = $installer->getEntityTypeId('customer');
$vCustAttributeSetId = $installer->getDefaultAttributeSetId($vCustomerEntityType);
$vCustAttributeGroupId = $installer->getDefaultAttributeGroupId($vCustomerEntityType, $vCustAttributeSetId);

$installer->addAttribute('customer', 'avatar', array(
    'label' => 'Avatar Image',
    'input' => 'file',
    'type'  => 'varchar',
    'forms' => array('customer_account_edit','adminhtml_customer'),
    'required' => 0,
    'user_defined' => 1,
));

$installer->addAttributeToGroup($vCustomerEntityType, $vCustAttributeSetId, $vCustAttributeGroupId, 'avatar', 0);

$oAttribute = Mage::getSingleton('eav/config')->getAttribute('customer', 'avatar');
$oAttribute->setData('used_in_forms', array('customer_account_edit','adminhtml_customer'));
$oAttribute->save();

$installer->endSetup();
