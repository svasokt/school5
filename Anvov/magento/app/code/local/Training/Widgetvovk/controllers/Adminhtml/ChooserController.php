<?php
/**
 * Class WidgetvovkController
 *
 * @category    Training
 * @package     Training_Widgetvovk
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

require_once  'Mage/Adminhtml/controllers/Cms/Wysiwyg/ImagesController.php';

class Training_Widgetvovk_Adminhtml_ChooserController extends Mage_Adminhtml_Cms_Wysiwyg_ImagesController
{
    /**
     * Fire when select image.
     *
     * @return void
     */
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
    /**
     * Allow requests for all admin users
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return true;
    }
}
