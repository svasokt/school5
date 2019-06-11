<?php
/**
 * Block for GRID
 *
 * @category    Training
 * @package     Training_Cron
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Cron_Block_Adminhtml_Items_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Init class
     */
    public function __construct()
    {
        parent::__construct();

        $this->setId('training_cron_items_edit_form');
        $this->setTitle($this->__('Blog Information'));
    }

    /**
     * Setup form fields for inserts/updates
     *
     * return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $dateFormatIso = Mage::app()->getLocale()->getDateTimeFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
        $model = Mage::registry('training_cron');

        $form = new Varien_Data_Form(array(
            'id'        => 'edit_form',
            'action'    => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
            'method'    => 'post'
        ));

        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend'    => Mage::helper('checkout')->__('Blog Information'),
            'class'     => 'fieldset-wide',
        ));

        if ($model->getId()) {
            $fieldset->addField('blogpost_id', 'hidden', array(
                'name' => 'blogpost_id',
            ));
        }

        $fieldset->addField('title', 'text', array(
            'name'      => 'title',
            'label'     => Mage::helper('checkout')->__('Title'),
            'title'     => Mage::helper('checkout')->__('Title'),
            'required'  => true,
        ));

        $fieldset->addField('post', 'text', array(
            'name'      => 'post',
            'label'     => Mage::helper('checkout')->__('Post'),
            'title'     => Mage::helper('checkout')->__('Post'),
            'required'  => true,
        ));

        $fieldset->addField('date', 'date', array(
            'name'      => 'date',
            'label'     => Mage::helper('checkout')->__('Date'),
            'title'     => Mage::helper('checkout')->__('Date'),
            'image'  => $this->getSkinUrl('images/grid-cal.gif'), // calendar choose only 1969 years
            'format' => $dateFormatIso,
            'input_format' => $dateFormatIso,
            'required'  => true
        ));

        $fieldset->addField('custom_value', 'text', array(
            'name'      => 'custom_value',
            'label'     => Mage::helper('checkout')->__('Custom Value'),
            'title'     => Mage::helper('checkout')->__('Custom Value'),
            'required'  => true,
        ));

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}