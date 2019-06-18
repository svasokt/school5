<?php

class World_Hometask_Block_Adminhtml_Contactsus_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
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
        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
