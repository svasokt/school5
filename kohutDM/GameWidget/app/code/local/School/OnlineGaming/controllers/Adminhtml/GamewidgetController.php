<?php
class School_OnlineGaming_Adminhtml_GamewidgetController extends Mage_Adminhtml_Controller_Action
{
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('onlinegaming/games');
    }

    public function chooserAction()
    {
        $uniqId = $this->getRequest()->getParam('uniq_id');
        $gameGrid = $this->getLayout()->createBlock('onlinegaming/Widget_Chooser','',array('id'=>$uniqId));
        $this->getResponse()->setBody($gameGrid->toHtml());
    }
}