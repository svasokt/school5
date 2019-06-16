<?php

/**
 * Container for GRID
 *
 * @category    Training
 * @package     Training_Contactus
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */


class Training_Contactus_Block_Adminhtml_Items extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'training_contactus';

        // The controller must match the second half of how we call the block
        $this->_controller = 'adminhtml_items';

        $this->_headerText = $this->__('Contacts of users');

        parent::__construct();

        /** Remove add button from grid */
        $this->removeButton('add');
    }
}
