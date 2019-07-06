<?php
/**
 * Training Avatarcustomer source model fro multiselect
 *
 * @category    Training
 * @package     Training_Avatarcustomer
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Avatarcustomer_Model_Skills extends Varien_Object
{
    const HTML5    = 1;
    const PHP   = 2;
    const JS = 3;
    const MYSQL = 4;
    const CSS3 = 5;

    /**
     * aaray for DB and form
     * @return array
     */
    static public function getOptionArray()
    {
        return array(
            self::HTML5    => Mage::helper('training_avatarcustomer')->__('HTML5'),
            self::PHP    => Mage::helper('training_avatarcustomer')->__('PHP'),
            self::JS    => Mage::helper('training_avatarcustomer')->__('JavaScript'),
            self::MYSQL    => Mage::helper('training_avatarcustomer')->__('MYSQL'),
            self::CSS3    => Mage::helper('training_avatarcustomer')->__('CSS3'),
        );
    }
}
