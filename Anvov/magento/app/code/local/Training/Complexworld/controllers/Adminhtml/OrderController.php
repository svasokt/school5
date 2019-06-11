<?php
/**
 * Class IndexController
 *
 * @category    Training
 * @package     Training_Weblog
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Complexworld_Adminhtml_OrderController extends Mage_Adminhtml_Controller_Action
{

    public function indexAction()
    {
        $this->loadLayout();
        /** This block will point to the file Block/Adminhtml/Order/Items.php */
        $this->_addContent($this->getLayout()->createBlock('training_complexworld/adminhtml_order_items'));
        $this->renderLayout();
    }

    public function newAction()
    {
        // We just forward the new action to a blank edit form
        $this->_forward('edit');
    }

    public function editAction()
    {
        $this->_initAction();

        // Get id if available
        $id  = $this->getRequest()->getParam('id');
        $model = Mage::getModel('weblog/blogpost');

        if ($id) {
            // Load record
            $model->load($id);

            // Check if record is loaded
            if (!$model->getBlogpostId()) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('This vendor no longer exists.'));
                $this->_redirect('*/*/');

                return;
            }
        }

        $this->_title($model->getBlogpostId() ? $model->getTitle() : $this->__('New'));

        $data = Mage::getSingleton('adminhtml/session')->getBlogpostData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        Mage::register('training_complexworld', $model);

        $this->_initAction()
            ->_addBreadcrumb($id ? $this->__('Edit') : $this->__('New'), $id ? $this->__('Edit') : $this->__('New'))
            ->_addContent($this->getLayout()->createBlock('training_complexworld/adminhtml_order_edit')->setData('action', $this->getUrl('*/*/save')))
            ->renderLayout();
    }

    public function saveAction()
    {
        if ($postData = $this->getRequest()->getPost()) {
            $model = Mage::getSingleton('weblog/blogpost');
            $model->setData($postData);

            try {
                $model->save();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The vendor has been saved.'));
                $this->_redirect('*/*/');

                return;
            }
            catch (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
            catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('An error occurred while saving this vendor.'));
            }

            // Save the form data in order to fill the form
            Mage::getSingleton('adminhtml/session')->setVendorData($postData);
            $this->_redirectReferer();
        }
    }

    public function messageAction()
    {
        $data = Mage::getModel('codealist_backendmodule/vendor')->load($this->getRequest()->getParam('id'));
        echo $data->getContent();
    }

    /**
     * Initialize action
     *
     * Here, we set the breadcrumbs and the active menu
     *
     * @return Mage_Adminhtml_Controller_Action
     */
    protected function _initAction()
    {
        $this->loadLayout()
            // Make the active menu match the menu config nodes (without 'children' inbetween)
            // vendor/codealist_backendmodule comes from the values we entered when we declared our menu option in adminhtml.xml
            ->_setActiveMenu('weblog/blogpost')
            ->_title($this->__('Vendor'))->_title($this->__('Vendor'))
            ->_addBreadcrumb($this->__('Vendor'), $this->__('Vendor'))
            ->_addBreadcrumb($this->__('Manage Vendors'), $this->__('Manage Vendors'));

        return $this;
    }



    /**
     * Deletes the vendor by the ID provided
     */
    public function deleteAction()
    {
        $id  = $this->getRequest()->getParam('id');
        $model = Mage::getModel('weblog/blogpost')->load($id);
        $model->delete();

        Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The vendor has been deleted.'));
        $this->_redirect('*/*/');
    }

    /**
     * Check currently called action by permissions for current user
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        // vendor/codealist_backendmodule comes from the values we entered when we declared our menu option in adminhtml.xml
        return Mage::getSingleton('admin/session')->isAllowed('sales/training_complexworld');
    }
}