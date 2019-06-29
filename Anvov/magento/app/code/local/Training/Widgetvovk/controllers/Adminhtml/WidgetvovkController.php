<?php
/**
 * Class WidgetvovkController
 *
 * @category    Training
 * @package     Training_Widgetvovk
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Widgetvovk_Adminhtml_WidgetvovkController extends Mage_Adminhtml_Controller_Action
{
    public function chooserAction()
    {
        $uniqId = $this->getRequest()->getParam('uniq_id');
        $blogGrid = $this->getLayout()->createBlock('training_widgetvovk/widget_chooser', '' , array(
            'id' => $uniqId,
        ));
        $this->getResponse()->setBody($blogGrid->toHtml());
    }

    public function _isAllowed()
    {
        return true;
    }
}
