<?php
class School_OnlineGaming_Block_Adminhtml_Gamesgrid_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('game_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle('Game info');
    }

    protected function _beforeToHtml()
    {
        $this->addTab('general', array(
            'label' => 'General',
            'title' => 'General',
            'content' => $this->getLayout()
                ->createBlock('onlinegaming/adminhtml_gamesgrid_edit_tab_description')
                ->toHtml()
        ));

        $this->addTab('general two', array(
            'label' => 'General Two',
            'title' => 'General Two',
            'content' => $this->getLayout()
                ->createBlock('onlinegaming/adminhtml_gamesgrid_edit_tab_onemore')
                ->toHtml()
        ));

        $this->addTab('image', array(
            'label' => 'Image',
            'title' => 'Image',
            'content' => $this->getLayout()
                ->createBlock('onlinegaming/adminhtml_gamesgrid_edit_tab_image')
                ->toHtml()
        ));

        return parent::_beforeToHtml();
    }
}
