<?php

class World_Hometask_Block_Adminhtml_Contactsus_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_objectId = 'id';
        $this->_controller = 'adminhtml_contactsus';
        $this->_blockGroup = 'hometask';


        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('adminhtml')->__('Save Appeal'));
        $this->_updateButton('delete', 'label', Mage::helper('hometask')->__('Delete Appeal'));

        $this->_addButton('send', array(
            'label'     => Mage::helper('adminhtml')->__('Send Email'),
//            'onclick'   => 'setLocation(\'' . $this->getUrl('*/*/send/', array('id' => ''. $this->getRequest()->getParam('id'))) .'\')',
            'onclick'   => 'saveAndSend()',
            'class'     => 'save',
        ),-100);
        $this->_formScripts[] = "


            function saveAndSend(){
                editForm.submit($('edit_form').action+'is_send/1/');
            }
        ";
    }

    /**
     * Get edit form container header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry('hometask_contactsus')->getId()) {
            return Mage::helper('hometask')->__("Appeal", $this->escapeHtml(Mage::registry('hometask_contactsus')->getTitle()));
        }
        else {
//            return Mage::helper('hometask')->__('New Posts');
        }
    }

}
