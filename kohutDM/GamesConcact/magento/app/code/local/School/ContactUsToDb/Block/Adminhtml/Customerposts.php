<?php
class School_ContactUsToDb_Block_Adminhtml_Customerposts extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'contactustodb';
        $this->_controller = 'adminhtml_customerposts';
        $this->_headerText = $this->__('POSTS');

        parent::__construct();

        $this->_removeButton('add');
    }

    /**
     * Check permission for passed action
     *
     * @param string $action
     * @return bool
     */
    protected function _isAllowedAction($action)
    {
        return Mage::getSingleton('admin/session')->isAllowed('contactustodb/customerposts' . $action);
    }

}