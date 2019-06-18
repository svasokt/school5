<?php
class World_Hometask_Block_Adminhtml_Contactsus_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('contactsus_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('hometask')->__('Appeal Information'));
    }

    protected function _prepareLayout()
    {
        $this->addTab('main_tab',array(
            'label' => $this->__('Main'),
            'title' => $this->__('Main'),
            'content' => $this->getLayout()->createBlock('hometask/adminhtml_contactsus_edit_tab_main')->toHtml(),
            'enctype' => 'multipart/form-data',
        ));
//        $this->addTab('some _tab',array(
//            'label' => $this->__('Some'),
//            'title' => $this->__('Some'),
//            'content' => $this->getLayout()->createBlock('hometask/adminhtml_contactsus_edit_tab_some')->toHtml()
//        ));
        return parent::_prepareLayout();
    }
}
