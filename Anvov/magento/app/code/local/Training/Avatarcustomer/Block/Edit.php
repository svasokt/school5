<?php

/**
 * Block for avatarcustomer/form.layout
 *
 * @category    Training
 * @package     Training_Avatarcustomer
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */


class Training_Avatarcustomer_Block_Edit extends Mage_Customer_Block_Form_Edit
{
    /**
     * Return items for multiselect
     *
     * @return mixed
     */
    public function getModel()
    {
        $data = Mage::getModel("training_avatarcustomer/skills");

        return $data::getOptionArray();
    }

    /**
     * Get data from db and return array
     *
     * @return array
     */
    public function getChosenOptions()
    {
        $string = $this->getCustomer()->getSkills();
        $array = explode(",", $string);

        return $array;
    }
}
