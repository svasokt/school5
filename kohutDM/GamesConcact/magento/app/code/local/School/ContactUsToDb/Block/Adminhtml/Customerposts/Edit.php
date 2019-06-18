<?php
class School_ContactUsToDb_Block_Adminhtml_Customerposts_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {

        $this->_objectId = 'post_id';
        $this->_controller = 'adminhtml_customerposts';
        $this->_blockGroup = 'contactustodb';

        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('school_contactustodb')->__('Save post'));
        $this->_updateButton('delete', 'label', Mage::helper('school_contactustodb')->__('Delete post'));

        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save and Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('school_contactustodb')->__('Send email'),
            'onclick'   => "saveAndSend()",
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "function saveAndContinueEdit(){
            editForm.submit($('edit_form').action+'back/edit/');
        }
        function saveAndSend(){
            editForm.submit($('edit_form').action+'send/edit/');
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
        if (Mage::registry('contactustodb_customerposts')->getId()) {
            return Mage::helper('school_contactustodb')->__("Answer on '%s' post", $this->escapeHtml(Mage::registry('contactustodb_customerposts')->getName()));
        }
        else {
            return false;
        }
    }
}
