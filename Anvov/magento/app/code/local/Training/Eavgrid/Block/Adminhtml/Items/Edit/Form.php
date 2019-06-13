<?php
/**
 * Block for GRID
 *
 * @category    Training
 * @package     Training_Cron
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Eavgrid_Block_Adminhtml_Items_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Init class
     */
    public function __construct()
    {
        parent::__construct();

        $this->setId('training_eavgrid_items_edit_form');
        $this->setTitle($this->__('Eav Blog Information'));
    }

    /**
     * Setup form fields for inserts/updates
     *
     * return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $dateFormatIso = Mage::app()->getLocale()->getDateTimeFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
        $model = Mage::registry('training_eavgrid');

        $form = new Varien_Data_Form(array(
            'id'        => 'edit_form',
            'action'    => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
            'method'    => 'post'
        ));

        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend'    => Mage::helper('checkout')->__('Eav Blog Information'),
            'class'     => 'fieldset-wide',
        ));

        if ($model->getId()) {
            $fieldset->addField('entity_id', 'hidden', array(
                'name' => 'entity_id',
            ));
        }

        $fieldset->addField('title', 'text', array(
            'name'      => 'title',
            'label'     => Mage::helper('checkout')->__('Title'),
            'title'     => Mage::helper('checkout')->__('Title'),
            'required'  => true,
        ));

        $fieldset->addField('content', 'text', array(
            'name'      => 'content',
            'label'     => Mage::helper('checkout')->__('Content'),
            'title'     => Mage::helper('checkout')->__('Content'),
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

        $fieldset->addField('status', 'select', array(
            'name'      => 'status',
            'label'     => Mage::helper('checkout')->__('Status'),
            'title'     => Mage::helper('checkout')->__('Status'),
            'required'  => true,
            'values' => array('1' => 'Published','0' => 'Not Published'),
        ));


        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}