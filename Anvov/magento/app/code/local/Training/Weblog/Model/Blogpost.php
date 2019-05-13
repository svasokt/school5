<?php
/**
 * Class IndexController
 *
 * @category    Training
 * @package     Training_Weblog
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Weblog_Model_Blogpost extends Mage_Core_Model_Abstract
{
    /**
     * Resource init
     */
    protected function _construct()
    {
        $this->_init('weblog/blogpost');
    }
}