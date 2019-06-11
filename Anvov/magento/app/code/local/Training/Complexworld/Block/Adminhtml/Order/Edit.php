<?php

/**
 * Block for GRID
 *
 * @category    Training
 * @package     Training_Complexworld
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */


class Training_Complexworld_Block_Adminhtml_Order_Edit extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        // This block is called as training_complexworld/adminhtml_order_items

        // The blockGroup must match the first half of how we call the block
        $this->_blockGroup = 'training_complexworld';

        // The controller must match the second half of how we call the block
        $this->_controller = 'adminhtml_order_edit';

        $this->_headerText = Mage::helper('adminhtml')->__('Training Orders Items');

        parent::__construct();
//        $this->_removeButton('add');
    }
}