<?php

/**
 * Block for GRID
 *
 * @category    Training
 * @package     Training_Contactus
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */


class Training_Contactus_Block_Adminhtml_Items_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
        Mage::registry('training_contactus');

        $this->_blockGroup = 'training_contactus';
        $this->_controller = 'adminhtml_items';

        $this->_updateButton('save', 'label', $this->__('Save Answer'));
        $this->_updateButton('delete', 'label', $this->__('Delete'));
        $this->addButton('send',
            array(
                'label'     => Mage::helper('training_contactus')->__('Send answer'),
                'onclick'   => "location.href='".$this->getUrl('*/*/send/id/'. $this->getRequest()->getParam('id'))."'",
                'class'     => '',
            ));
    }

    /**
     * Get Header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry('training_contactus')->getId()) {
            return $this->__('Edit Contact');
        }
        else {
            return $this->__('New Contact');
        }
    }
}
