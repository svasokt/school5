<?php  

class World_Grid_Block_Adminhtml_Posts extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'grid';
        $this->_controller = 'adminhtml_posts';
        $this->_headerText = $this->__('Grid');
        parent::__construct();
    }
}