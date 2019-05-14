<?php

/**
 * Block for first.layout
 *
 * @category    Training
 * @package     Training_First
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */


class Training_First_Block_Third extends Mage_Core_Block_Template
{

    public function thirdFunction()
    {
        return "My t-short is nice";
    }

    public function layoutMethod($val1,$val2)
    {
        echo $val1 . $val2;
    }
}