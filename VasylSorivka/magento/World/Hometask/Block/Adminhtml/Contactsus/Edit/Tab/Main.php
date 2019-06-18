<?php

class World_Hometask_Block_Adminhtml_Contactsus_Edit_Tab_Main extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Init form
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('contactsus_form');
        $this->setTitle(Mage::helper('hometask')->__('Contacts Us Information'));
    }

    protected function _prepareForm()
    {
        $model = Mage::registry('hometask_contactsus');
        $form = new Varien_Data_Form(
            array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/save',array('id'=>$this->getRequest()->getParam('id'))),
                'method' => 'post'
            )
        );

        $form->setHtmlIdPrefix('contactsus_');

        $fieldset = $form->addFieldset('base_fieldset', array('legend'=>Mage::helper('hometask')->__('General Information'), 'class' => 'fieldset-wide'));

        if ($model->getBlockId()) {
            $fieldset->addField('id', 'hidden', array(
                'name' => 'id',
            ));
        }

        $fieldset->addField('name', 'text', array(
            'name'      => 'name',
            'label'     => Mage::helper('hometask')->__('Name'),
            'title'     => Mage::helper('hometask')->__('Name'),
            'disabled' => true,
            'required'  => true,
        ));

        $fieldset->addField('email', 'text', array(
            'name'      => 'email',
            'label'     => Mage::helper('hometask')->__('Email'),
            'title'     => Mage::helper('hometask')->__('Email'),
            'disabled' => true,
            'required'  => true,
        ));

        $fieldset->addField('telephone', 'text', array(
            'name'      => 'telephone',
            'label'     => Mage::helper('hometask')->__('Telephone'),
            'title'     => Mage::helper('hometask')->__('Telephone'),
            'disabled' => true,
            'required'  => true,
        ));

        $fieldset->addField('comment', 'textarea', array(
            'name'      => 'comment',
            'label'     => Mage::helper('hometask')->__('Comment'),
            'title'     => Mage::helper('hometask')->__('Comment'),
            'disabled' => true,
            'required'  => true,
        ));

        $fieldset->addField('response', 'textarea', array(
            'name'      => 'response',
            'label'     => Mage::helper('hometask')->__('Response'),
            'title'     => Mage::helper('hometask')->__('Response'),
//            'required'  => true,
        ));

        $fieldset->addField('status', 'select', array(
            'label'     => Mage::helper('hometask')->__('Answered'),
            'title'     => Mage::helper('hometask')->__('Answered'),
            'name'      => 'status',
            'required'  => true,
            'options'   => Mage::getModel('hometask/source_status')->toArray(),
        ));

        $form->setValues($model->getData());
        $form->setUseContainer(false);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
