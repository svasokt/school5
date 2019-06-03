<?php
/**
 * Class IndexController
 *
 * @category    Training
 * @package     Training_Weblog
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Complexworld_Model_Iphonepost extends Mage_Core_Model_Abstract
{
    /**
     * Resource init
     */
    protected function _construct()
    {
        $this->_init('complexworld/iphonepost');
    }

    protected function _beforeLoad($id, $field = null)
    {
        $params = array('object' => $this, 'field' => $field, 'value'=> $id);
        Mage::dispatchEvent('model_load_before', $params);
        $params = array_merge($params, $this->_getEventData());
        Mage::dispatchEvent('complexworld_model'.'_load_before', $params);
        return $this;
    }
}