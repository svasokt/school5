<?php
/**
 * Class IndexController
 *
 * @category    Training
 * @package     Training_Weblog
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Contactus_Model_Resource_Contactus extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Resource init
     */
    protected function _construct()
    {
        $this->_init('contactus/contactus', 'contactus_id');
    }
}
