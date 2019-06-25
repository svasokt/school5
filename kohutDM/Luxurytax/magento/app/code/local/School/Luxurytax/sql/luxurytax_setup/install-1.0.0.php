<?php
$installer = $this;
$installer->startSetup();

$installer->getConnection()
    ->addColumn($installer->getTable('sales/order'),'base_luxury_tax_amount', array(
        'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
        'scale'     => 4,
        'precision' => 12,
        'comment' => 'base_luxury_tax_amount'
    ));
$installer->getConnection()->addColumn($installer->getTable('sales/order'),'luxury_tax_amount', array(
        'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
        'scale'     => 4,
        'precision' => 12,
        'comment' => 'luxury_tax_amount'
    ));
$installer->getConnection()->addColumn($installer->getTable('sales/quote'),'base_luxury_tax_amount', array(
        'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
        'scale'     => 4,
        'precision' => 12,
        'comment' => 'base_luxury_tax_amount'
    ));
$installer->getConnection()->addColumn($installer->getTable('sales/quote'),'luxury_tax_amount', array(
        'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
        'scale'     => 4,
        'precision' => 12,
        'comment' => 'luxury_tax_amount'
    ));
$installer->endSetup();
