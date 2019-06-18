<?php

/**
 * Block for GRID
 *
 * @category    Training
 * @package     Training_Complexworld
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */


class Training_Eavgrid_Block_Adminhtml_Items_Edit_Tabs_Additional extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        // This block is called as training_complexworld/adminhtml_order_items

        // The blockGroup must match the first half of how we call the block

        // The controller must match the second half of how we call the block

        parent::__construct();

        $this->_blockGroup = 'training_eavgrid';
        $this->_controller = 'adminhtml_items_edit_tabs_additional_form';

        $this->_updateButton('save', 'label', $this->__('Save Eav Blog'));
        $this->_updateButton('delete', 'label', $this->__('Delete Eav Blog'));
    }

    /**
     * Get Header text
     *
     * @return string
     */
    public function getHeaderText()
    {
            return $this->__('Edit Eav grid');
    }
}