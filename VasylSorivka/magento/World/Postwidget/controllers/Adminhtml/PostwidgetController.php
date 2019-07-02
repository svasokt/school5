<?php
class World_Postwidget_Adminhtml_PostwidgetController extends Mage_Adminhtml_Controller_Action
{
    public function chooserAction()
    {
        $uniqId = $this->getRequest()->getParam('uniq_id');
        $blogGrid = $this->getLayout()->createBlock('post_widget/widget_chooser', '', array(
        'id' => $uniqId,
        ));
        $this->getResponse()->setBody($blogGrid->toHtml());
    }

    protected function _isAllowed()
    {
        return true;
    }
}
