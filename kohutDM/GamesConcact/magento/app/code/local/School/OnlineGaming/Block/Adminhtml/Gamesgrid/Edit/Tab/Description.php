<?php
class School_OnlineGaming_Block_Adminhtml_Gamesgrid_Edit_Tab_Description extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $model = Mage::registry('onlinegaming_gamesgrid');

        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('game_form', array('legend'=>Mage::helper('adminhtml')->__('General Information'), 'class' => 'fieldset-wide'));

            $fieldset->addField('entity_id', 'hidden', array(
                'name' => 'entity_id',
            ));

        $fieldset->addField('title', 'text', array(
            'name'      => 'title',
            'label'     => Mage::helper('adminhtml')->__('Block Title'),
            'title'     => Mage::helper('adminhtml')->__('Block Title'),
            'required'  => true,
        ));

        $fieldset->addField('creator', 'text', array(
            'name'      => 'creator',
            'label'     => Mage::helper('adminhtml')->__('Creator'),
            'title'     => Mage::helper('adminhtml')->__('Creator'),
            'required'  => true,
        ));

        $form->setValues($model->getData());

        return parent::_prepareForm();
    }
}
