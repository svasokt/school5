<?php

require_once 'Mage/Adminhtml/controllers/Cms/Wysiwyg/ImagesController.php';

class School_OnlineGaming_Adminhtml_Cms_Wysiwyg_ImagesController extends Mage_Adminhtml_Cms_Wysiwyg_ImagesController
{
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('onlinegaming/games');
    }

    public function onInsertAction()
    {
        $helper = Mage::helper('cms/wysiwyg_images');
        $storeId = $this->getRequest()->getParam('store');
        $filename = $this->getRequest()->getParam('filename');
        $filename = $helper->idDecode($filename);
        Mage::helper('catalog')->setStoreId($storeId);
        $helper->setStoreId($storeId);
        $fileUrl = $helper->getCurrentUrl() . $filename;
        $mediaPath = str_replace(Mage::getBaseUrl('media'), '', $fileUrl);
        $this->getResponse()->setBody($mediaPath);
    }
}
