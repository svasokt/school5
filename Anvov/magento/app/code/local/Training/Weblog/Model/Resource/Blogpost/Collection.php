<?php
/**
 * Class IndexController
 *
 * @category    Training
 * @package     Training_Weblog
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Weblog_Model_Resource_Blogpost_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    /**
     * Resource init
     */
    protected function _construct()
    {
        $this->_init('weblog/blogpost');
    }
}