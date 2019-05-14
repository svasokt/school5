<?php

/**
 * Block for first.layout
 *
 * @category    Training
 * @package     Training_First
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */


class Training_First_Block_Forth extends Mage_Core_Block_Template
{

    public function forthFunction()
    {
        return "I like canada";
    }

    /**
     * Method I use directly from layout
     */
    public function layoutFunction()
    {
        echo "yes we call diractly from layout";
    }
}