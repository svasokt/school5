<?php
/**
 * Training Database5 data install script
 *
 * @category Training
 * @package Trainig_Database5
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */

namespace Training\Database5\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * @codeCoverageIgnore
 */
class Bohdan extends AbstractDb
{
    /**
     * Connection with DB with table "bohdan" and "entity_id" is column there , we pass it in order to have
     * an opportunity use Fabric method ->load({id of member from table bohdan})
     */
    protected function _construct()
    {
        $this->_init('bohdan','entity_id');
    }
}