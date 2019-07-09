<?php
class School_OnlineGaming_Block_Adminhtml_Gamesgrid extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'onlinegaming';
        $this->_controller = 'adminhtml_gamesgrid';
        $this->_headerText = $this->__('GAMES');

        parent::__construct();

        if ($this->_isAllowedAction('save')) {
            $this->_updateButton('add', 'label', Mage::helper('admin')->__('Add New Game'));
        } else {
            $this->_removeButton('add');
        }

    }

    /**
     * Check permission for passed action
     *
     * @param string $action
     * @return bool
     */
    protected function _isAllowedAction($action)
    {
        return Mage::getSingleton('admin/session')->isAllowed('onlinegaming/games/' . $action);
    }

}