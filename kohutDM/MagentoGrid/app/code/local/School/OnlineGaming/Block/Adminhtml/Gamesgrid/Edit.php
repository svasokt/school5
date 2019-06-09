<?php
class School_OnlineGaming_Block_Adminhtml_Gamesgrid_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {

        $this->_objectId = 'block_id';
        $this->_controller = 'adminhtml_gamesgrid';
        $this->_blockGroup = 'onlinegaming';

        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('adminhtml')->__('Save Block'));
        $this->_updateButton('delete', 'label', Mage::helper('adminhtml')->__('Delete Block'));

        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save and Continue Edit'),
            'onclick'   => 'saveAndContinueEdit',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
                function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
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
        if (Mage::registry('adminhtml_gamesgrid')->getId()) {
            return Mage::helper('adminhtml')->__("Edit Block '%s'", $this->escapeHtml(Mage::registry('adminhtml_gamesgrid')->getTitle()));
        }
        else {
            return Mage::helper('adminhtml')->__('New Block');
        }
    }

    public function getSaveUrl()
    {
        return $this->getUrl('*/gamesgrid/save');
    }
}
