<?php
/**
 * Block for GRID
 *
 * @category    Training
 * @package     Training_Eavgrid
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Eavgrid_Block_Adminhtml_Items_Edit_Tabs_Additional_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Init class
     */
    public function __construct()
    {
        parent::__construct();

        $this->setId('training_eavgrid_items_edit_tabs_additional');
        $this->setTitle($this->__('Eav Blog Information Additional'));
    }

    /**
     * Setup form fields for inserts/updates
     *
     * return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $model = Mage::registry('training_eavgrid');

        $form = new Varien_Data_Form(array(
            'id'        => 'edit_form',
            'action'    => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
            'method'    => 'post'
        ));

        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend'    => Mage::helper('checkout')->__('additional'),
            'class'     => 'fieldset-wide',
        ));

        if ($model->getId()) {
            $fieldset->addField('entity_id', 'hidden', array(
                'name' => 'entity_id',
            ));
        }

//        $fieldset->addField('responsible', 'text', array(
//            'name'      => 'responsible',
//            'label'     => Mage::helper('checkout')->__('Responsible'),
//            'title'     => Mage::helper('checkout')->__('Responsible'),
//        ));

        $fieldset->addField('city', 'text', array(
            'name'      => 'city',
            'label'     => Mage::helper('checkout')->__('City'),
            'title'     => Mage::helper('checkout')->__('City'),
        ));


        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}