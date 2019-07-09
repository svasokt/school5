<?php
/**
 * Training Avatarcustomer source model fro multiselect
 *
 * @category    Training
 * @package     Training_Avatarcustomer
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Avatarcustomer_Model_Skillssource extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
    /**
     * Special type of writing to add options for
     * multi select in db
     *
     * @return array
     */
    public function getAllOptions()
    {
        if (is_null($this->_options)) {
            $this->_options = array(

                array(
                    "label" => Mage::helper('training_avatarcustomer')->__('HTML5'),
                    "value" =>  1
                ),

                array(
                    "label" => Mage::helper('training_avatarcustomer')->__('PHP'),
                    "value" =>  2
                ),

                array(
                    "label" => Mage::helper('training_avatarcustomer')->__('JavaScript'),
                    "value" =>  3
                ),

                array(
                    "label" => Mage::helper('training_avatarcustomer')->__('MYSQL'),
                    "value" =>  4
                ),

                array(
                    "label" => Mage::helper('training_avatarcustomer')->__('CSS3'),
                    "value" =>  5
                ),
            );
        }
        return $this->_options;
    }
}
