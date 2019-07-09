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

    /**
     * Image url for edit.phptml
     *
     * @return string
     */
    public function getImageUrl()
    {
        $folders = Mage::helper('training_avatarcustomer')->getPartImageUrl();

        return $folders . $this->getCustomer()->getAvatar();
    }

    /**
     * Make associative array for multiselect
     *
     * @return array
     */
    public function adapterSourceModel()
    {
        $model = Mage::getModel("training_avatarcustomer/skillssource");
        $array = $model->getAllOptions();

        $newArray = array_column($array, "label", "value");

        return $newArray;
    }
}
