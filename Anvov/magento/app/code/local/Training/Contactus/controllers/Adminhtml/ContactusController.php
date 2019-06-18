<?php
/**
 * Class ContactusController
 *
 * @category    Training
 * @package     Training_Contactus
 * @copyright   Copyright (c) 2006-2019 Magento, Inc. (http://www.magento.com)
 * @license     Smile
 */

class Training_Contactus_Adminhtml_ContactusController extends Mage_Adminhtml_Controller_Action
{
    /**
     * index page
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * return edit
     */
    public function newAction()
    {
        // We just forward the new action to a blank edit form
        $this->_forward('edit');
    }

    /**
     * @throws Mage_Core_Exception
     */
    public function editAction()
    {
        $this->_initAction();

        // Get id if available
        $id  = $this->getRequest()->getParam('id');
        $model = Mage::getModel('contactus/contactus');

        if ($id) {
            // Load record
            $model->load($id);

            // Check if record is loaded
            if (!$model->getContactusId()) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('This contact no longer exists.'));
                $this->_redirect('*/*/');

                return;
            }
        }

        $this->_title($model->getContactusId() ? $model->getTitle() : $this->__('New Contact'));

        $data = Mage::getSingleton('adminhtml/session')->getData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        Mage::register('training_contactus', $model);

        $this->_initAction()
            ->_addBreadcrumb($id ? $this->__('Edit Contact') : $this->__('New Contact'), $id ? $this->__('Edit Contact') : $this->__('New Contact'))
            ->_addContent($this->getLayout()->createBlock('training_contactus/adminhtml_items_edit')->setData('action', $this->getUrl('*/eavgrid/save')))
//            ->_addLeft($this->getLayout()->createBlock("training_eavgrid/adminhtml_items_edit_tabs"))
            ->renderLayout();
    }

    /**
     * Save answer
     */
    public function saveAction()
    {
        if ($postData = $this->getRequest()->getPost()) {
//            $model = Mage::getModel('weblog/blogpost')->load($postData->getId); this variant works too!
            $model = Mage::getSingleton('contactus/contactus');
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

    /**
     * Delete contact
     * @throws Exception
     */
    protected function deleteAction()
    {
        $params = $this->getRequest()->getParam('id');
        $model = Mage::getModel('contactus/contactus');
        $model->load($params);
        Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The blog has been Deleted.'));
        $model->delete();
        $this->_redirect('*/*/index');
    }

//    public function massDeleteAction()
//    {
//        $entities = $this->getRequest()->getParam('contactus');
//        if (!is_array($entities)) {
//            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Please select item(s)'));
//        } else {
//            try {
//                /** variant from internet, works */
////                foreach ($entities as $entity) {
////                    $blog = Mage::getModel('complexworld/iphonepost')->load($entity);
////                    $blog->delete();
//                $collection = Mage::getModel('contactus/contactus')->getCollection();
//                $collection->addFieldToFilter('contactus_id',['in'=>$entities]);
//                $collection->load();
//                $collection->delete();
//
//                Mage::getSingleton('adminhtml/session')->addSuccess
//                (
//                    Mage::helper('adminhtml')->__('Total of %d record(s) were successfully deleted',
//                        count($entities))
//                );
//            } catch (Exception $e) {
//                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
//            }
//        }
//        $this->_redirect('*/*/index');
//    }

    /**
     * send email
     */
    public function sendAction()
    {
        $params = $this->getRequest()->getParam('id');
        $model = Mage::getModel('contactus/contactus');
        $model->load($params);
        if(empty($model->getAnswer())) {
            $this->_redirect('*/*/index');
            Mage::getSingleton('core/session')->addError('Comment is not set, please check answer');
        }elseif ($model->getStatus() == 0 && !empty($model->getAnswer()) ) {
            $mail = Mage::getModel('core/email')
                ->setToEmail($model->getEmail())
                ->setBody($model->getComment() . ' Answer is : ' . $model->getAnswer())
                ->setSubject('Magento answer')
                ->setFromEmail('admin@example.com')
                ->setFromName('Your Store Name')
                ->setType('html');
            try {
                $model->setStatus('1');
                $model->save();
                Mage::log($mail, null, 'mail.log', true);
                Mage::getSingleton('core/session')->addSuccess('Your request has been sent');
            }
            catch(Exception $ex) {
                Mage::getSingleton('core/session')->addError('Unable to send email.');
            }
            $this->_redirect('*/*/index');
        } else {
            $this->_redirect('*/*/index');
            Mage::getSingleton('core/session')->addError('Comment was sent before!!');
        }

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

    /**
     * Export CSV
     */
    public function exportCsvAction()
    {
        $fileName = 'Blog.csv';
        $content = $this->getLayout()
            ->createBlock('training_contactus/adminhtml_items_grid')
            ->getCsv();
        $this->_prepareDownloadResponse($fileName, $content);
    }

    /**
     * Export XML
     */
    public function exportXmlAction()
    {
        $fileName = 'Blog.xml';
        $content = $this->getLayout()
            ->createBlock('training_contactus/adminhtml_items_grid')
            ->getXml();
        $this->_prepareDownloadResponse($fileName, $content);
    }

     /**
     * Check currently called action by permissions for current user
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('training_contactus_items');
    }
}
