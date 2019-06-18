<?php
class World_Hometask_Block_Adminhtml_Contactsus_Edit_Tab_Some extends Mage_Adminhtml_Block_Widget_Form
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('contactsus_form');
        $this->setTitle(Mage::helper('hometask')->__('Contacts Us Information'));
    }
}

