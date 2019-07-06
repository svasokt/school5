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

    public function getModel()
    {
        $data = Mage::getModel("training_avatarcustomer/skills");

        return $data::getOptionArray();
    }

    public function getChosenOptions()
    {
        $string = $this->getCustomer()->getSkills();
        $array = explode(",", $string);
        return $array;
    }
}
