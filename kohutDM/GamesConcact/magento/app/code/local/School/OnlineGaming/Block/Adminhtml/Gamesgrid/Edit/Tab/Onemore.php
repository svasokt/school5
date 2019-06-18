<?php
class School_OnlineGaming_Block_Adminhtml_Gamesgrid_Edit_Tab_Onemore extends Mage_Adminhtml_Block_Widget_Form
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

        $fieldset->addField('description', 'editor', array(
            'name'      => 'description',
            'label'     => Mage::helper('adminhtml')->__('Description'),
            'title'     => Mage::helper('adminhtml')->__('Description'),
            'style'     => 'height:15em',
            'required'  => true,
            'config'    => Mage::getSingleton('cms/wysiwyg_config')->getConfig()
        ));

        $form->setValues($model->getData());

        return parent::_prepareForm();
    }
}
