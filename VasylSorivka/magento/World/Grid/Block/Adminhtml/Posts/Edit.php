<?php

class World_Grid_Block_Adminhtml_Posts_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    public function __construct()
    {

        $this->_objectId = 'id';
        $this->_controller = 'adminhtml_posts';
        $this->_blockGroup = 'grid';


        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('adminhtml')->__('Save Posts'));
        $this->_updateButton('delete', 'label', Mage::helper('grid')->__('Delete Posts'));

        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save and Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
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
        if (Mage::registry('grid_posts')->getId()) {
            return Mage::helper('grid')->__("Edit Posts '%s'", $this->escapeHtml(Mage::registry('grid_posts')->getTitle()));
        }
        else {
            return Mage::helper('grid')->__('New Posts');
        }
    }

}
