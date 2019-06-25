<?php

$installer = $this;
$installer->startSetup();
$installer->getConnection()
    ->changeColumn($installer->getTable('sales/order'), 'base_custom_discount_amount',  'custom_discount_amount',  array(
            'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
            'length' => '12,4',
            'default'     => null, // column name to insert new column after
            'comment'   => 'Training Discounter'
        )
    );
$installer->getConnection()
    ->changeColumn($installer->getTable('sales/order'), 'base_luxury_tax_amount','base_custom_discount_amount',  array(
            'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
            'length' => '12,4',
            'default'     => null, // column name to insert new column after
            'comment'   => 'Training base discounter'
        )
    );
$installer->endSetup();
