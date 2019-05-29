<?php
/**
 * @var Mage_Core_Model_Resource_Setup $installer
 */

$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('onlinegaming/gamesrank'))
    ->addColumn('rank_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Rank Id')
    ->addColumn('game_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
        'nullable'  => false,
    ), 'Game Id')
    ->addColumn('rank', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
        'nullable'  => false,
    ), 'Rank')
    ->addColumn('quality', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'unsigned'  => true,
        'nullable'  => false,
    ), 'Quality')
    ->addForeignKey($installer->getFkName('onlinegaming/gamesrank', 'game_id', 'onlinegaming/eavgames', 'entity_id'),
    'game_id', $installer->getTable('onlinegaming/eavgames'), 'entity_id',
    Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE);
$installer->getConnection()->createTable($table);

$installer->endSetup();
