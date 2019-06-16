<?php
/**
 * Block for GRID
 *
 * @category    Training
 * @package     Training_Contactus
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Contactus_Block_Adminhtml_Items_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Init class
     */
    public function __construct()
    {
        parent::__construct();

        $this->setId('training_contactus_items_edit_form');
        $this->setTitle($this->__('Contact Information'));
    }

    /**
     * Setup form fields for inserts/updates
     *
     * return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $dateFormatIso = Mage::app()->getLocale()->getDateTimeFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
        $model = Mage::registry('training_contactus');

        $form = new Varien_Data_Form(array(
            'id'        => 'edit_form',
            'action'    => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
            'method'    => 'post'
        ));

        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend'    => Mage::helper('checkout')->__('Contact Information'),
            'class'     => 'fieldset-wide',
        ));

        if ($model->getId()) {
            $fieldset->addField('contactus_id', 'hidden', array(
                'name' => 'contactus_id',
            ));
        }

        $fieldset->addField('name', 'text', array(
            'name'      => 'name',
            'label'     => Mage::helper('checkout')->__('Name'),
            'title'     => Mage::helper('checkout')->__('Name'),
            'disabled'  => true,
        ));

        $fieldset->addField('email', 'text', array(
            'name'      => 'email',
            'label'     => Mage::helper('checkout')->__('Email'),
            'title'     => Mage::helper('checkout')->__('Email'),
            'disabled'  => true,
        ));

        $fieldset->addField('telephone', 'text', array(
            'name'      => 'telephone',
            'label'     => Mage::helper('checkout')->__('Telephone'),
            'title'     => Mage::helper('checkout')->__('Telephone'),
            'disabled'  => true,
        ));

        $fieldset->addField('comment', 'textarea', array(
            'name'      => 'comment',
            'label'     => Mage::helper('checkout')->__('Comment'),
            'title'     => Mage::helper('checkout')->__('Comment'),
            'disabled'  => true,
        ));

        $fieldset->addField('answer', 'textarea', array(
            'name'      => 'answer',
            'label'     => Mage::helper('checkout')->__('Answer'),
            'title'     => Mage::helper('checkout')->__('Answer'),
            'required'  => true,
        ));

        $fieldset->addField('status', 'select', array(
            'name'      => 'status',
            'label'     => Mage::helper('checkout')->__('Status'),
            'title'     => Mage::helper('checkout')->__('Status'),
            'values' => array('1' => 'Answered','0' => 'Not Answered'),
            'disabled'  => true,
        ));

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
