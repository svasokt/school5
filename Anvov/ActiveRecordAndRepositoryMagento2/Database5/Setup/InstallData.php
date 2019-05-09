<?php
/**
 * Training Database5 data install script
 *
 * @category Training
 * @package Trainig_Database5
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */

namespace Training\Database5\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /**
         * Install users into table "bohdan"
         */
        $data = [
            [
                'name'=>'Andriy',
                'address'=>'Zelena 13',
                'status'=>true,
            ],
            [
                'name'=>'Petro',
                'address'=>'Zelena 11',
                'status'=>true,
            ]
        ];
        foreach ($data as $bind) {
            $setup->getConnection()
                ->insertForce($setup->getTable('bohdan'), $bind);
        }
    }
}