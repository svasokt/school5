<?php

/**
 * Block for GRID
 *
 * @category    Training
 * @package     Training_Complexworld
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */


class Training_Eavgrid_Block_Adminhtml_Items extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        // This block is called as training_complexworld/adminhtml_order_items

        // The blockGroup must match the first half of how we call the block
        $this->_blockGroup = 'training_eavgrid';

        // The controller must match the second half of how we call the block
        $this->_controller = 'adminhtml_items';

        $this->_headerText = $this->__('Eav');

        parent::__construct();
    }
}