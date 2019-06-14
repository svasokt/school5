<?php

class School_ContactUsToDb_Adminhtml_Contactustodb_CustomerpostsController extends Mage_Adminhtml_Controller_Action
{
    const XML_PATH_EMAIL_RECIPIENT  = 'contacts/email/recipient_email';
    const XML_PATH_EMAIL_SENDER     = 'contacts/email/sender_email_identity';
    const XML_PATH_EMAIL_TEMPLATE   = 'contacts/email/email_template';
    const XML_PATH_ENABLED          = 'contacts/contacts/enabled';

    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('contactustodb/posts');
    }

    public function indexAction()
    {
        $this->_initAction();
        $this->renderLayout();
    }

    protected function _initAction()
    {
        $this->loadLayout()
            // Make the active menu match the menu config nodes (without 'children' inbetween)
            ->_setActiveMenu('contactustodb')
            ->_title($this->__('Customer posts'))
            ->_addBreadcrumb($this->__('grid'), $this->__('grid'));
        return $this;
    }

    public function editAction()
    {
        $this->_initAction();
        // Get id if available
        $id  = $this->getRequest()->getParam('post_id');
        $model = Mage::getModel('contactustodb/customerposts');
        if ($id) {
            // Load record
            $model->load($id);
            // Check if record is loaded
            if (!$model->getId()) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('This post no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }

        Mage::register('contactustodb_customerposts', $model);
        $this//->_initAction()
            ->_addBreadcrumb($this->__('Edit Post'), $this->__('Edit Post'))
            ->_addContent($this->getLayout()->createBlock('contactustodb/adminhtml_customerposts_edit')->setData('action', $this->getUrl('*/contactustodb_customerposts/save')))
            ->renderLayout();
    }

    /**
     * Send email
     */
    public function sendAction($model)
    {
        if (!$model->getAnswer()==null && $model->getAnswerStatus()=='no'){
            $mailTemplate = Mage::getModel('core/email_template');
            /* @var $mailTemplate Mage_Core_Model_Email_Template */
            $mailTemplate->setDesignConfig(array('area' => 'frontend'))
                ->setReplyTo($model->getEmail())
                ->sendTransactional(
                    Mage::getStoreConfig(self::XML_PATH_EMAIL_TEMPLATE),
                    Mage::getStoreConfig(self::XML_PATH_EMAIL_SENDER),
                    Mage::getStoreConfig(self::XML_PATH_EMAIL_RECIPIENT),
                    null,
                    array('data' => $model)
                );
            Mage::log('Answer to' . $model->getEmail() . ' - '. $model->getAnswer(), null, 'debug.log', true);
            $model->setAnswerStatus('yes');
            $model->save();
            // display success message
            Mage::getSingleton('adminhtml/session')->addSuccess(
                Mage::helper('school_contactustodb')->__('The answer has been successfully sent'));
            // go to grid
        } elseif (!$model->getAnswer()==null && $model->getAnswerStatus()=='yes') {
        Mage::getSingleton('adminhtml/session')->addSuccess(
            Mage::helper('school_contactustodb')->__('Can`t send one more answer'));
        // go to grid
        } elseif ($model->getAnswer()==null) {
            Mage::getSingleton('adminhtml/session')->addSuccess(
                Mage::helper('school_contactustodb')->__('Make your answer first'));
        }
    }

    /**
     * Save action
     */
    public function saveAction()
    {
        // check if data sent
        if ($data = $this->getRequest()->getPost()) {
            $data = $this->_filterPostData($data);
            //init model and set data
            $model = Mage::getModel('contactustodb/customerposts');

            if ($id = $this->getRequest()->getParam('post_id')) {
                $model->load($id);
            }

            $model->setData($data);

            Mage::dispatchEvent('contactustodb_customerposts_prepare_save', array('customerposts' => $model, 'request' => $this->getRequest()));

            //validating
            if (!$this->_validatePostData($data)) {
                $this->_redirect('*/*/edit', array('post_id' => $model->getId(), '_current' => true));
                return;
            }

            // try to save it
            try {
                // save the data
                $model->save();
                // check if 'Save and Send'
                if ($this->getRequest()->getParam('send')) {
                    $this->sendAction($model);
                    $this->_redirect('*/*/edit', array('post_id' => $model->getId()));
                    return;
                }
                // display success message
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('school_contactustodb')->__('The answer has been saved'));
                // clear previously saved data from session
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                // check if 'Save and Continue'
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('post_id' => $model->getId()));
                    return;
                }
                // go to grid
                $this->_redirect('*/*/');
                return;

            } catch (Mage_Core_Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
            catch (Exception $e) {
                $this->_getSession()->addException($e,
                    Mage::helper('school_contactustodb')->__('An error occurred while saving the answer.'));
            }

            $this->_getSession()->setFormData($data);
            $this->_redirect('*/*/edit', array('post_id' => $this->getRequest()->getParam('post_id')));
            return;
        }
        $this->_redirect('*/*/');
    }

    /**
     * Delete action
     */
    public function deleteAction()
    {
        // check if we know what should be deleted
        if ($id = $this->getRequest()->getParam('post_id')) {
            $title = "";
            try {
                // init model and delete
                $model = Mage::getModel('contactustodb/customerposts');
                $model->load($id);
                $title = $model->getTitle();
                $model->delete();
                // display success message
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('admin')->__('The answer has been deleted.'));
                // go to grid
                $this->_redirect('*/*/');
                return;

            } catch (Exception $e) {
                // display error message
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                // go back to edit form
                $this->_redirect('*/*/edit', array('post_id' => $id));
                return;
            }
        }
        // display error message
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('admin')->__('Unable to find a post to delete.'));
        // go to grid
        $this->_redirect('*/*/');
    }

    /**
     * Filtering posted data. Converting localized data if needed
     *
     * @param array
     * @return array
     */
    protected function _filterPostData($data)
    {
        $data = $this->_filterDates($data, array('custom_theme_from', 'custom_theme_to'));
        return $data;
    }

    protected function _validatePostData($data)
    {
        $errorNo = true;
        if (!empty($data['layout_update_xml']) || !empty($data['custom_layout_update_xml'])) {
            /** @var $validatorCustomLayout Mage_Adminhtml_Model_LayoutUpdate_Validator */
            $validatorCustomLayout = Mage::getModel('adminhtml/layoutUpdate_validator');
            if (!empty($data['layout_update_xml']) && !$validatorCustomLayout->isValid($data['layout_update_xml'])) {
                $errorNo = false;
            }
            if (!empty($data['custom_layout_update_xml'])
                && !$validatorCustomLayout->isValid($data['custom_layout_update_xml'])) {
                $errorNo = false;
            }
            foreach ($validatorCustomLayout->getMessages() as $message) {
                $this->_getSession()->addError($message);
            }
        }
        return $errorNo;
    }
}
