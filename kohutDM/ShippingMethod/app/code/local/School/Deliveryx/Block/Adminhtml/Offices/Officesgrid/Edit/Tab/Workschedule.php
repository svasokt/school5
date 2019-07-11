<?php
class School_Deliveryx_Block_Adminhtml_Offices_Officesgrid_Edit_Tab_Workschedule extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $model = Mage::registry('deliveryx_officesgrid');

        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('offices_form', array('legend' => Mage::helper('deliveryx')->__('Work Schedule Information'), 'class' => 'fieldset-wide'));

        $fieldset->addField('entity_id', 'hidden', array(
            'name' => 'entity_id',
        ));

        $fieldset->addField('work_status', 'select', array(
            'name' => 'work_status',
            'label' => Mage::helper('deliveryx')->__('Work Status'),
            'title' => Mage::helper('deliveryx')->__('Work Status'),
            'required' => true,
            'values' => array(''=>    'Please Select..','1' => 'yes','0' => 'no'),
        ));

        $fieldset->addField('opening', 'select', array(
            'name' => 'opening',
            'label' => Mage::helper('deliveryx')->__('Opening Time'),
            'title' => Mage::helper('deliveryx')->__('Opening Time'),
            'required' => true,
            'values' => array(''=>    'Please Select..','8' => '8:00',
                                                        '9' => '9:00',
                                                        '10' => '10:00',
                                                        '11' => '11:00'),
        ));

        $fieldset->addField('closing', 'select', array(
            'name' => 'closing',
            'label' => Mage::helper('deliveryx')->__('Closing Time'),
            'title' => Mage::helper('deliveryx')->__('Closing Time'),
            'required' => true,
            'values' => array(''=>    'Please Select..','17' => '17:00',
                                                        '18' => '18:00',
                                                        '19' => '19:00',
                                                        '20' => '20:00'),
        ));

        $form->setValues($model->getData());

        return parent::_prepareForm();
    }
}
