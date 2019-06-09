<?php
/**
 * Class IndexController
 *
 * @category    Training
 * @package     Training_Weblog
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Eavgrid_Adminhtml_EavgridController extends Mage_Adminhtml_Controller_Action
{

    public function indexAction()
    {
        $this->loadLayout();
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
        $model = Mage::getModel('complexworld/iphonepost');

        if ($id) {
            // Load record
            $model->load($id);

            // Check if record is loaded
            if (!$model->getEntityId()) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('This blog no longer exists.'));
                $this->_redirect('*/*/');

                return;
            }
        }

        $this->_title($model->getEntityId() ? $model->getTitle() : $this->__('New Blog'));

        $data = Mage::getSingleton('adminhtml/session')->getData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        Mage::register('training_eavgrid', $model);

        $this->_initAction()
            ->_addBreadcrumb($id ? $this->__('Edit Blog') : $this->__('New Blog'), $id ? $this->__('Edit Blog') : $this->__('New Blog'))
            ->_addContent($this->getLayout()->createBlock('training_eavgrid/adminhtml_items_edit')->setData('action', $this->getUrl('*/eavgrid/save')))
            ->renderLayout();
    }

    public function saveAction()
    {
        if ($postData = $this->getRequest()->getPost()) {
//            $model = Mage::getModel('weblog/blogpost')->load($postData->getId); this variant works too!
            $model = Mage::getSingleton('complexworld/iphonepost');
            $model->setData($postData);

            try {
                $model->save();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The blog has been saved.'));
                $this->_redirect('*/*/index');

                return;
            }
            catch (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
            catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('An error occurred while saving this blog.'));
            }

            Mage::getSingleton('adminhtml/session')->setItemsData($postData);
            $this->_redirectReferer();
        }
    }

    public function messageAction()
    {
        $data = Mage::getModel('complexworld/iphonepost')->load($this->getRequest()->getParam('id'));
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
            ->_setActiveMenu('training_eavgrid')
            ->_title($this->__('Eav grid'))
            ->_addBreadcrumb($this->__('Eav grid'), $this->__('Eav grid'));
        return $this;
    }

    protected function deleteAction()
    {
        $params = $this->getRequest()->getParam('id');
        $model = Mage::getModel('complexworld/iphonepost');
        $model->load($params);
        Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The blog has been Deleted.'));
        $model->delete();
        $this->_redirect('*/*/index');
    }

    /**
     * Check currently called action by permissions for current user
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('training_eavgrid_items');
    }
}
