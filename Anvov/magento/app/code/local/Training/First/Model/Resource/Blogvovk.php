<?php
/**
 * Class IndexController
 *
 * @category    Training
 * @package     Training_Weblog
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_First_Model_Resource_Blogvovk extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Resource init
     */
    protected function _construct()
    {
        $this->_init('first/blogvovk', 'blogvovk_id');
    }
}