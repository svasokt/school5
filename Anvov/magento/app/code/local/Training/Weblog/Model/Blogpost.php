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
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'weblog_blogpost';

    /**
     * Parameter name in event
     *
     * In observe method you can use $observer->getEvent()->getObject() in this case
     *
     * @var string
     */
    protected $_eventObject = 'post';

    /**
     * Resource init
     */
    protected function _construct()
    {
        $this->_init('weblog/blogpost');
    }
}