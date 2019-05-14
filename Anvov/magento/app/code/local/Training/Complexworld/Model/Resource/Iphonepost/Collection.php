<?php
/**
 * Collection with eav
 *
 * @category    Training
 * @package     Training_Complexworld
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Complexworld_Model_Resource_Iphonepost_Collection extends Mage_Eav_Model_Entity_Collection_Abstract
{
    /**
     * Resource init
     */
    protected function _construct()
    {
        $this->_init('complexworld/iphonepost');
    }
}