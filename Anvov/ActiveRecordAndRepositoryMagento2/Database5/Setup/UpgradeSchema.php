<?php
/**
 * Training Database5 update schema install script
 *
 * @category Training
 * @package Trainig_Database5
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */

namespace Training\Database5\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

/**
 * @codeCoverageIgnore
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * Upgrade columns in table 'bohdan'
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        if(version_compare($context->getVersion(),'0.1.3','<')) {
            $setup->getConnection()->addColumn(
                $setup->getTable('bohdan'),
                'phone_number',
                ['nullable'=>false,'type'=> \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,'comment'=>'PHONE NUMBER OF MEMBER']
            );
        }
    }
}