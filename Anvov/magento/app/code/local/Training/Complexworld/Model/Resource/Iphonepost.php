<?php
/**
 * Resource
 *
 * @category    Training
 * @package     Training_Complexworld
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Complexworld_Model_Resource_Iphonepost extends Mage_Eav_Model_Entity_Abstract
{
    /**
     * Resource init
     */
    protected function _construct()
    {
        $resource = Mage::getSingleton('core/resource');
        $this->setType('complexworld_iphonepost');
        $this->setConnection(
            $resource->getConnection('complexworld_read'),
            $resource->getConnection('complexworld_write')
        );
    }
}