<?php  

class World_Hometask_Block_Adminhtml_Contactsus extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {

        $this->_blockGroup = 'hometask';
        $this->_controller = 'adminhtml_contactsus';
        $this->_headerText = $this->__('Contacts Us');

        parent::__construct();
        $this->removeButton('add');
    }
}
