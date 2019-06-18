<?php

class World_Hometask_Model_Source_Status
{

    const Yes = '1';
    const No = '0';

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => self::Yes, 'label'=>Mage::helper('hometask')->__('Yes')),
            array('value' => self::No, 'label'=>Mage::helper('hometask')->__('No')),
        );
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            self::Yes => Mage::helper('hometask')->__('Yes'),
            self::No => Mage::helper('hometask')->__('No'),
        );
    }
}

