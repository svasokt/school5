<?php


/**
 * Training Observer
 *
 * @category    Training
 * @package     Training_Customermodule
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */


class Training_Weblog_Model_Observer extends Varien_Event_Observer
{
    /**
     * observer on save new cms page , it works !
     */
    public function log($observer)
    {
       $event = $observer->getEvent();
       Mage::log($event, null, 'event_debug.log', true);
    }
}
