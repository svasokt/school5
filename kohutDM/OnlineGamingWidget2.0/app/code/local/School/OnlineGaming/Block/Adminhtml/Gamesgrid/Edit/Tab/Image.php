<?php
class School_OnlineGaming_Block_Adminhtml_Gamesgrid_Edit_Tab_Image extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $model = Mage::registry('onlinegaming_gamesgrid');

        $form = new Varien_Data_Form();
        $this->setForm($form);

        $fieldset = $form->addFieldset('game_form', array('legend'=>Mage::helper('adminhtml')->__('General Information'), 'class' => 'fieldset-wide'));

        $fieldset->addField('picture', 'image', array(
            'label' => Mage::helper('adminhtml')->__('picture'),
            'name' => 'picture',
            'note' => '(*.jpg, *.png, *.gif)'
        ));

        $form->setValues($model->getData());
        $pictureUrl = $form->getElement('picture')->getValue();
        $pictureUrl = substr($pictureUrl, 7);
        $form->getElement('picture')->setValue($pictureUrl);

        return parent::_prepareForm();
    }
}
